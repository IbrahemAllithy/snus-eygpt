<?php

use App\Models\Admin\AvailableQty;
use App\Models\Admin\Currency;
use App\Models\Admin\CurrentTheme;
use App\Models\Admin\PaymentMethodSetting;
use App\Models\Admin\ProductCombination;
use App\Models\Admin\Setting;
use App\Models\DemoSettings;
use App\Services\Web\SiteContentService;

if (! function_exists('getSetting')) {

    function getSetting()
    {
        $settings = Setting::whereNotIn('type', ['app_general', 'app_display_in_setting', 'app_notification_setting', 'app_login_signup'])->get();
        // Keep storefront views renderable while optional settings are absent.
        $normalizdSetting = [
            'header_style' => 'style1',
            'Footer_style' => 'style1',
            'slider_style' => 'style1',
            'banner_style' => 'style1',
            'card_style' => 'style1',
            'product_detail' => 'style1',
            'shop' => 'style1',
            'color' => 'style',
            'cart_page' => 'style1',
            'login' => 'style1',
            'about_us_web' => 'style1',
            'blog' => 'style1',
            'contact_us' => 'style1',
            'authenticate_with_email_password' => '1',
            'authenticate_with_google' => '0',
            'authenticate_with_facebook' => '0',
            'authenticate_with_phone' => '0',
            'minimum_order_total' => '0',
            'free_shipping_order_price' => '0',
            'is_deliveryboyapp_purchased' => '0',
            'wallet_setting' => '0',
            'point_setting' => '0',
            'new_bage_on_product_card_visibility' => '1',
            'site_name' => 'Snus Egypt',
            'site_logo' => '/assets/images/snuslogo1.png',
            'about_us' => '',
            'address' => '',
            'phone_number' => '',
            'email' => '',
            'facebook_url' => '#',
            'google_url' => '#',
            'instagram_url' => '#',
            'linkedin_url' => '#',
            'twitter_url' => '#',
            'instagram_embed' => '',
            'google_map_api_string' => '',
            'razorpay_theme_color' => '#c8f238',
        ];
        foreach ($settings as $setting) {
            $normalizdSetting[$setting->key] = $setting->value;
        }

        $demoSettings = DemoSettings::where('ip', \Request::ip())->first();
        if ($demoSettings) {
            $normalizdSetting['header_style'] = $demoSettings->header_style;
            $normalizdSetting['Footer_style'] = $demoSettings->footer_style;
            $normalizdSetting['slider_style'] = $demoSettings->slider_style;
            $normalizdSetting['banner_style'] = $demoSettings->banner_style;
            $normalizdSetting['card_style'] = $demoSettings->cart_style;
            $normalizdSetting['product_detail'] = $demoSettings->product_page_style;
            $normalizdSetting['shop'] = $demoSettings->shop_style;
            $normalizdSetting['color'] = $demoSettings->color;

        }

        // dd($normalizdSetting);
        return $normalizdSetting;
    }
}

if (! function_exists('homePageBuilderJson')) {

    function homePageBuilderJson()
    {
        $currentThemeSetting = [];
        if (CurrentTheme::first()) {
            $currentThemeSetting = CurrentTheme::first()->home_setting;
            $currentThemeSetting = json_decode($currentThemeSetting, true);
        }

        return $currentThemeSetting;
    }
}

if (! function_exists('currencyConvertor')) {

    function currencyConvertor($value)
    {
        $currency = Currency::where('id', 1)->first();
        if ($currency) {
            $calculatedValue = $value * $currency->exchange_rate;

            if ($currency == 'left') {
                $currency->code.' '.$calculatedValue;
            } else {
                $calculatedValue.' '.$currency->code;
            }
        }
    }
}

if (! function_exists('PaymentMethods')) {

    function PaymentMethods($key)
    {
        $PaymentMethod = PaymentMethodSetting::where('key', $key)->first();

        return $PaymentMethod;
    }
}

if (! function_exists('variationProductTitleBasedOnCombinationId')) {

    function variationProductTitleBasedOnCombinationId($id)
    {
        $productVariations = ProductCombination::where('id', $id)->with('combination', 'combination.variation', 'combination.variation.variation_detail')->first();
        \Log::info($productVariations);
        $title = '(';
        if (isset($productVariations->combination)) {
            foreach ($productVariations->combination as $key => $combination) {
                foreach ($combination->variation->variation_detail as $key2 => $variation) {
                    if ($variation->language_id == 1) {
                        $title .= $variation->name;
                        if ($key + 1 != count($productVariations->combination)) {
                            $title .= '-';
                        }
                    }

                }

            }
        }

        return $title.')';
    }
}

if (! function_exists('averagePriceProductIdBased')) {

    function averagePriceProductIdBased($productId, $combinationId, $warehouse)
    {

        $average = \DB::table('transaction_detail')
            ->select(\DB::raw('SUM(dr_amount) As dr_sum'), \DB::raw('SUM(cr_amount) AS cr_sum'));
        if ($productId != null) {
            $average = $average->where('reference_id', $productId);
        }
        if ($combinationId != null) {
            $average = $average->where('reference_id', $combinationId);
        }

        $average = $average->where('warehouse_id', $warehouse);
        $average = $average->where('type', 'purchase');

        $average = $average->first();

        $available_qty = new AvailableQty;
        if ($combinationId != null) {
            $available_qty = $available_qty->where('product_combination_id', $combinationId);
        }
        if ($productId != null) {
            $available_qty = $available_qty->where('product_id', $productId);
        }

        $available_qty = $available_qty->where('warehouse_id', $warehouse);
        $available_qty = $available_qty->value('remaining');
        if ($available_qty != 0) {
            return ($average->dr_sum - $average->cr_sum) / $available_qty;
        } else {
            return '0';
        }
    }
}

if (! function_exists('site_content')) {
    function site_content(string $key, mixed $default = null): mixed
    {
        return app(SiteContentService::class)->get($key, $default);
    }
}

if (! function_exists('site_image')) {
    function site_image(?string $path): string
    {
        $fallback = asset('assets/images/snuslogo1.png');
        if ($path === null || trim($path) === '') {
            return $fallback;
        }
        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        return asset(ltrim($path, '/'));
    }
}

if (! function_exists('site_link')) {
    function site_link(array $item): string
    {
        $url = trim((string) ($item['url'] ?? ''));
        if ($url !== '') {
            if (preg_match('#^https?://#i', $url) || str_starts_with($url, '/')) {
                return $url;
            }

            return url($url);
        }

        $brand = trim((string) ($item['brand'] ?? ''));
        if ($brand !== '') {
            return route('brand.show', $brand);
        }

        return url('/shop');
    }
}

if (! function_exists('site_href')) {
    function site_href(?string $url, string $fallback = '#'): string
    {
        $url = trim((string) $url);
        if (preg_match('#^https?://#i', $url) || str_starts_with($url, '/')) {
            return $url;
        }

        return $fallback;
    }
}

if (! function_exists('site_color')) {
    function site_color(?string $color, string $fallback): string
    {
        return is_string($color) && preg_match('/^#([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$/', $color)
            ? $color
            : $fallback;
    }
}

if (! function_exists('site_icon')) {
    function site_icon(?string $icon): string
    {
        return is_string($icon) && preg_match('/^(fas|far|fab|fal|fad) fa-[a-z0-9-]+$/', $icon)
            ? $icon
            : 'fas fa-star';
    }
}
