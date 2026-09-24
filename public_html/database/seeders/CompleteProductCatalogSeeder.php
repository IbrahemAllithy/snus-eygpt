<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use App\Models\Admin\Language;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\ProductDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use RuntimeException;

class CompleteProductCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $languages = Language::where('status', 'active')->get(['id', 'code', 'is_default']);
        $defaultLanguageId = $languages->firstWhere('is_default', 1)?->id ?? $languages->first()?->id;
        $categoryId = Category::where('category_slug', 'nicotine-pouches')->value('id')
            ?? Category::orderBy('id')->value('id');

        if ($languages->isEmpty()) {
            throw new RuntimeException('No active languages were found.');
        }

        if (! $categoryId) {
            throw new RuntimeException('No product category was found.');
        }

        DB::transaction(function () use ($languages, $defaultLanguageId, $categoryId): void {
            Product::active()->orderBy('id')->chunkById(100, function ($products) use ($languages, $defaultLanguageId, $categoryId): void {
                foreach ($products as $product) {
                    $source = ProductDetail::where('product_id', $product->id)
                        ->orderByRaw('language_id = ? desc', [$defaultLanguageId])
                        ->first();

                    $title = trim((string) ($source?->title ?? ''));
                    if ($title === '') {
                        $title = Str::headline($product->product_slug);
                    }

                    foreach ($languages as $language) {
                        $detail = ProductDetail::firstOrNew([
                            'product_id' => $product->id,
                            'language_id' => $language->id,
                        ]);

                        if (trim((string) $detail->title) === '') {
                            $detail->title = $title;
                        }

                        if (trim(strip_tags((string) $detail->desc)) === '') {
                            $detail->desc = $language->code === 'ar'
                                ? "اكتشف {$title} من منتجات أكياس النيكوتين الأصلية المتوفرة لدى سنس إيجيبت."
                                : "Discover {$title}, an original nicotine pouch product available from Snus Egypt.";
                        }

                        $detail->save();
                    }

                    ProductCategory::firstOrCreate([
                        'product_id' => $product->id,
                        'category_id' => $categoryId,
                    ]);

                    $galleryName = $product->gallary?->name;
                    if ($galleryName) {
                        $source = base_path('../images/'.$galleryName);
                        $destination = public_path('assets/images/products/'.$galleryName);

                        if (File::exists($source) && ! File::exists($destination)) {
                            File::ensureDirectoryExists(dirname($destination));
                            File::copy($source, $destination);
                        }
                    }
                }
            });
        });

        $this->command?->info('Completed product pages and category assignments for all active products.');
    }
}
