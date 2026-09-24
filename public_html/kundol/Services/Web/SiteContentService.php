<?php

namespace App\Services\Web;

use App\Models\Admin\Currency;
use App\Models\Admin\Language;
use App\Models\Admin\Product;
use App\Models\Admin\SiteContent;
use App\Models\Localization;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Throwable;

class SiteContentService
{
    private ?array $saved = null;

    public function get(string $key, mixed $default = null): mixed
    {
        $value = $default;
        foreach ($this->merged() as $item) {
            if ($item['key'] === $key) {
                $value = $item['value'];
                break;
            }
        }

        if (! $this->useEnglishCopy() || $this->isCustomized($key, $value)) {
            return $value;
        }

        $english = $this->englishCopy($key);
        if ($english === null) {
            return $value;
        }

        return $this->overlayEnglish($key, $value, $english);
    }

    public function grouped(): array
    {
        $groups = [];

        foreach ($this->merged() as $item) {
            $group = $item['group'];
            if (! isset($groups[$group])) {
                $groups[$group] = [
                    'key' => $group,
                    'label' => SiteContentCatalog::groupLabel($group),
                    'items' => [],
                ];
            }
            $groups[$group]['items'][] = $item;
        }

        return array_values($groups);
    }

    public function updateMany(array $items): array
    {
        if (! Schema::hasTable('site_contents')) {
            throw new \RuntimeException('شغّل ترحيل قاعدة البيانات قبل حفظ المحتوى.');
        }

        foreach ($items as $item) {
            $key = (string) ($item['key'] ?? '');
            $definition = SiteContentCatalog::find($key);
            if (! $definition) {
                continue;
            }

            SiteContent::query()->updateOrCreate(
                ['key' => $key],
                [
                    'group' => $definition['group'],
                    'label' => $definition['label'],
                    'type' => $definition['type'],
                    'value' => $this->sanitize($definition, $item['value'] ?? null),
                    'sort_order' => $definition['sort'],
                ]
            );
        }

        $this->saved = null;
        Cache::forget('site_contents');

        return $this->grouped();
    }

    public function catalogProducts(): array
    {
        return Product::query()
            ->active()
            ->with(['detail', 'gallary.detail'])
            ->orderByDesc('id')
            ->get()
            ->map(function (Product $product) {
                return [
                    'slug' => $product->product_slug,
                    'title' => $this->productTitle($product) ?: $product->product_slug,
                    'image' => $this->productImagePath($product),
                ];
            })
            ->values()
            ->all();
    }

    public function productSlots(): array
    {
        $slots = $this->get('home.product_slots', []);
        if (! is_array($slots)) {
            return [];
        }

        $slugs = collect($slots)
            ->map(fn ($slot) => is_array($slot) ? trim((string) ($slot['product_slug'] ?? '')) : '')
            ->filter()
            ->unique()
            ->values();

        $products = $slugs->isEmpty()
            ? collect()
            : Product::query()
                ->active()
                ->with(['detail', 'gallary.detail'])
                ->whereIn('product_slug', $slugs)
                ->get()
                ->keyBy('product_slug');

        $symbol = (string) (Currency::query()->where('is_default', 1)->value('code') ?: 'EGP');

        return array_map(function ($slot) use ($products, $symbol) {
            $slot = is_array($slot) ? $slot : [];
            $slug = trim((string) ($slot['product_slug'] ?? ''));
            $product = $slug !== '' ? $products->get($slug) : null;
            $customImage = trim((string) ($slot['image'] ?? ''));
            $customTitle = trim((string) ($slot['title'] ?? ''));
            $image = $customImage !== '' ? $customImage : ($product ? $this->productImagePath($product) : '');
            $title = $customTitle !== '' ? $customTitle : ($product ? $this->productTitle($product) : '');

            if ($image === '' && $title === '') {
                return ['empty' => true];
            }

            $price = null;
            if ($product) {
                $amount = (float) ($product->discount_price ?: $product->price);
                if ($amount > 0) {
                    $price = number_format($amount, 0).' '.$symbol;
                }
            }

            return [
                'empty' => false,
                'title' => $title !== '' ? $title : 'منتج',
                'image' => $image,
                'price' => $price,
                'url' => $product ? url('/product/'.$product->id.'/'.$product->product_slug) : url('/shop'),
            ];
        }, $slots);
    }

    public function storeUpload($file): array
    {
        $directory = public_path('uploads/site-content');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $extension = strtolower($file->getClientOriginalExtension() ?: 'jpg');
        $name = time().'-'.bin2hex(random_bytes(4)).'.'.$extension;
        $file->move($directory, $name);

        return [
            'path' => 'uploads/site-content/'.$name,
            'url' => asset('uploads/site-content/'.$name),
        ];
    }

    private function merged(): array
    {
        $saved = $this->savedValues();
        $items = [];

        foreach (SiteContentCatalog::items() as $item) {
            if (array_key_exists($item['key'], $saved) && $saved[$item['key']] !== null) {
                $item['value'] = $saved[$item['key']];
            }
            $items[] = $item;
        }

        return $items;
    }

    private function savedValues(): array
    {
        if ($this->saved !== null) {
            return $this->saved;
        }

        try {
            if (! Schema::hasTable('site_contents')) {
                return $this->saved = [];
            }

            return $this->saved = Cache::remember('site_contents', 3600, function () {
                return SiteContent::query()->pluck('value', 'key')->all();
            });
        } catch (Throwable) {
            return $this->saved = [];
        }
    }

    private function sanitize(array $definition, mixed $value): mixed
    {
        return match ($definition['type']) {
            'list' => $this->sanitizeList(is_array($value) ? $value : [], $definition['item_fields']),
            'mosaic' => [
                'large' => $this->sanitizeObject(is_array($value['large'] ?? null) ? $value['large'] : [], $definition['item_fields']),
                'items' => $this->sanitizeList(is_array($value['items'] ?? null) ? $value['items'] : [], $definition['item_fields']),
            ],
            'textarea' => mb_substr(trim((string) $value), 0, 5000),
            default => mb_substr(trim((string) $value), 0, 500),
        };
    }

    private function sanitizeList(array $rows, array $fields): array
    {
        $clean = [];
        foreach (array_slice($rows, 0, 40) as $row) {
            if (! is_array($row)) {
                continue;
            }
            $clean[] = $this->sanitizeObject($row, $fields);
        }

        return $clean;
    }

    private function sanitizeObject(array $row, array $fields): array
    {
        $clean = [];
        foreach ($fields as $field) {
            $raw = $row[$field['key']] ?? '';
            $clean[$field['key']] = $field['type'] === 'image'
                ? $this->cleanPath((string) $raw)
                : mb_substr(trim((string) $raw), 0, 500);
        }

        return $clean;
    }

    private function isCustomized(string $key, mixed $value): bool
    {
        $definition = SiteContentCatalog::find($key);
        if (! $definition) {
            return false;
        }

        return json_encode($value) !== json_encode($definition['value']);
    }

    private function useEnglishCopy(): bool
    {
        if (request()->attributes->has('store_language_english')) {
            return (bool) request()->attributes->get('store_language_english');
        }

        $code = session('locale');
        try {
            if (! is_string($code) || $code === '') {
                $code = Localization::query()->where('ip', request()->ip())->value('current_language');
            }
            if (! is_string($code) || $code === '') {
                $code = Language::query()->where('is_default', 1)->value('code');
            }
        } catch (Throwable) {
            $code = null;
        }

        $useEnglish = $code === 'en';
        request()->attributes->set('store_language_english', $useEnglish);

        return $useEnglish;
    }

    private function englishCopy(string $key): mixed
    {
        $slider = [
            ['title' => 'Swag', 'image' => 'assets/images/products/202608263205snusegy_swag_flavors.jpeg', 'brand' => 'swag', 'url' => ''],
            ['title' => 'Iceberg', 'image' => 'assets/images/products/202608265234snusegy_velo_citrus_burst.jpeg', 'brand' => 'iceberg', 'url' => ''],
            ['title' => 'Kick', 'image' => 'assets/images/products/202608265631snusegy_velo_tropical_breeze_strong.jpeg', 'brand' => 'kick', 'url' => ''],
            ['title' => 'White Fox', 'image' => 'assets/images/products/202608265427snusegy_velo_mighty_peppermint.jpeg', 'brand' => '', 'url' => '/shop'],
            ['title' => 'Velo', 'image' => 'assets/images/products/202608263626snusegy_velo_polar_mint.jpeg', 'brand' => 'velo', 'url' => ''],
            ['title' => 'Cuba', 'image' => 'assets/images/products/202608264059snusegy_velo_tropical_breeze.jpeg', 'brand' => 'cuba', 'url' => ''],
        ];

        return match ($key) {
            'home.shop_cta' => 'Shop now',
            'home.hero_slider' => $slider,
            'home.mosaic' => [
                'large' => $slider[0],
                'items' => [$slider[1], $slider[2], $slider[5], $slider[4]],
            ],
            'home.features' => [
                ['icon' => 'fas fa-shipping-fast', 'title' => 'Fast shipping', 'text' => 'Delivery across Egypt in under 48 hours', 'color_from' => '#10b981', 'color_to' => '#059669'],
                ['icon' => 'fas fa-shield-alt', 'title' => 'Genuine products', 'text' => 'Every product is 100% genuine and guaranteed', 'color_from' => '#C19A49', 'color_to' => '#9d7a35'],
                ['icon' => 'fas fa-headset', 'title' => '24/7 support', 'text' => 'Customer service available around the clock', 'color_from' => '#3b82f6', 'color_to' => '#2563eb'],
                ['icon' => 'fas fa-wallet', 'title' => 'Secure payment', 'text' => 'Several fully secure payment methods', 'color_from' => '#f59e0b', 'color_to' => '#d97706'],
            ],
            'home.brands_title' => 'Shop by brand',
            'home.brands_subtitle' => 'Explore our range of top brands',
            'home.new_title' => 'New arrivals',
            'home.new_subtitle' => 'The latest products added to the store',
            'home.featured_title' => 'Featured products',
            'home.featured_subtitle' => 'Our best-selling products',
            'home.slots_title' => 'Spaces for new products',
            'home.slots_subtitle' => 'Choose a product from the dashboard to fill a space with its image and price, or leave it empty for a later product',
            'home.newsletter_title' => 'Subscribe to our newsletter',
            'home.newsletter_text' => 'Get the latest offers and discounts in your inbox',
            'home.newsletter_placeholder' => 'Your email',
            'home.newsletter_button' => 'Subscribe',
            default => null,
        };
    }

    private function overlayEnglish(string $key, mixed $value, mixed $english): mixed
    {
        if (is_string($english)) {
            return $english;
        }

        if ($key === 'home.mosaic' && is_array($english)) {
            $current = is_array($value) ? $value : [];

            return [
                'large' => $this->mergeRow($current['large'] ?? [], $english['large'] ?? [], ['title']),
                'items' => $this->mergeRows($current['items'] ?? [], $english['items'] ?? [], ['title']),
            ];
        }

        if (is_array($english)) {
            $fields = $key === 'home.features' ? ['title', 'text'] : ['title'];

            return $this->mergeRows(is_array($value) ? $value : [], $english, $fields);
        }

        return $english;
    }

    private function mergeRows(array $current, array $english, array $fields): array
    {
        $rows = [];
        $total = max(count($current), count($english));
        for ($index = 0; $index < $total; $index++) {
            $rows[] = $this->mergeRow($current[$index] ?? [], $english[$index] ?? [], $fields);
        }

        return $rows;
    }

    private function mergeRow(array $current, array $english, array $fields): array
    {
        $row = $current !== [] ? $current : $english;
        foreach ($fields as $field) {
            if (isset($english[$field]) && $english[$field] !== '') {
                $row[$field] = $english[$field];
            }
        }

        return $row;
    }

    private function cleanPath(string $path): string
    {
        $path = trim($path);
        if ($path === '') {
            return '';
        }
        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        $path = ltrim($path, '/');
        if (str_contains($path, '..') || preg_match('/\.(php|phtml|phar|js|html?)$/i', $path)) {
            return '';
        }

        return $path;
    }

    private function productTitle(Product $product): string
    {
        $languageId = $this->languageId();
        $detail = $product->detail->firstWhere('language_id', $languageId) ?? $product->detail->first();

        return trim((string) ($detail->title ?? ''));
    }

    private function productImagePath(Product $product): string
    {
        $details = $product->gallary?->detail;
        if ($details === null || $details->isEmpty()) {
            return '';
        }

        $detail = $details->firstWhere('gallary_type', 'large') ?? $details->first();

        return trim((string) ($detail->path ?? ''));
    }

    private function languageId(): ?int
    {
        try {
            return (int) app(HomeService::class)->selectedLenguage();
        } catch (Throwable) {
            return null;
        }
    }
}
