<?php

namespace App\Services\Web;

class SiteContentCatalog
{
    public static function groupLabel(string $group): string
    {
        return match ($group) {
            'home' => 'الصفحة الرئيسية',
            'global' => 'عناصر الموقع',
            default => $group,
        };
    }

    public static function items(): array
    {
        $bannerFields = [
            ['key' => 'title', 'label' => 'العنوان', 'type' => 'text'],
            ['key' => 'image', 'label' => 'الصورة', 'type' => 'image'],
            ['key' => 'brand', 'label' => 'رابط البراند (slug)', 'type' => 'text'],
            ['key' => 'url', 'label' => 'رابط مخصص', 'type' => 'text'],
        ];

        return [
            self::text('home', 'home.shop_cta', 'زر تسوق الآن', 'تسوق الآن', 10),
            self::list('home', 'home.hero_slider', 'سلايدر الصفحة الرئيسية', $bannerFields, [
                self::banner('سواج', 'assets/images/products/202608263205snusegy_swag_flavors.jpeg', 'swag'),
                self::banner('آيسبرج', 'assets/images/products/202608265234snusegy_velo_citrus_burst.jpeg', 'iceberg'),
                self::banner('كيك', 'assets/images/products/202608265631snusegy_velo_tropical_breeze_strong.jpeg', 'kick'),
                self::banner('وايت فوكس', 'assets/images/products/202608265427snusegy_velo_mighty_peppermint.jpeg', '', '/shop'),
                self::banner('فيلو', 'assets/images/products/202608263626snusegy_velo_polar_mint.jpeg', 'velo'),
                self::banner('كوبا', 'assets/images/products/202608264059snusegy_velo_tropical_breeze.jpeg', 'cuba'),
            ], 20, 'كل شريحة: صورة، عنوان، ورابط براند أو رابط مخصص.'),
            [
                'key' => 'home.mosaic',
                'group' => 'home',
                'label' => 'بانرات الشبكة',
                'type' => 'mosaic',
                'hint' => 'بانر كبير وأربعة بانرات صغيرة.',
                'sort' => 30,
                'item_fields' => $bannerFields,
                'value' => [
                    'large' => self::banner('سواج', 'assets/images/products/202608263205snusegy_swag_flavors.jpeg', 'swag'),
                    'items' => [
                        self::banner('آيسبرج', 'assets/images/products/202608265234snusegy_velo_citrus_burst.jpeg', 'iceberg'),
                        self::banner('كيك', 'assets/images/products/202608265631snusegy_velo_tropical_breeze_strong.jpeg', 'kick'),
                        self::banner('كوبا', 'assets/images/products/202608264059snusegy_velo_tropical_breeze.jpeg', 'cuba'),
                        self::banner('فيلو', 'assets/images/products/202608263626snusegy_velo_polar_mint.jpeg', 'velo'),
                    ],
                ],
            ],
            self::list('home', 'home.features', 'مميزات المتجر', [
                ['key' => 'icon', 'label' => 'أيقونة Font Awesome', 'type' => 'text'],
                ['key' => 'title', 'label' => 'العنوان', 'type' => 'text'],
                ['key' => 'text', 'label' => 'الوصف', 'type' => 'textarea'],
                ['key' => 'color_from', 'label' => 'لون البداية', 'type' => 'text'],
                ['key' => 'color_to', 'label' => 'لون النهاية', 'type' => 'text'],
            ], [
                ['icon' => 'fas fa-shipping-fast', 'title' => 'شحن سريع', 'text' => 'توصيل لجميع المحافظات في أقل من 48 ساعة', 'color_from' => '#10b981', 'color_to' => '#059669'],
                ['icon' => 'fas fa-shield-alt', 'title' => 'منتجات أصلية', 'text' => 'جميع المنتجات أصلية 100% ومضمونة', 'color_from' => '#C19A49', 'color_to' => '#9d7a35'],
                ['icon' => 'fas fa-headset', 'title' => 'دعم 24/7', 'text' => 'خدمة عملاء متاحة على مدار الساعة', 'color_from' => '#3b82f6', 'color_to' => '#2563eb'],
                ['icon' => 'fas fa-wallet', 'title' => 'دفع آمن', 'text' => 'طرق دفع متعددة وآمنة تمامًا', 'color_from' => '#f59e0b', 'color_to' => '#d97706'],
            ], 40),
            self::text('home', 'home.brands_title', 'عنوان البراندات', 'تسوق حسب البراند', 50),
            self::text('home', 'home.brands_subtitle', 'وصف البراندات', 'اكتشف مجموعتنا المتنوعة من أفضل العلامات التجارية', 60),
            self::list('home', 'home.brand_images', 'صور البراندات', [
                ['key' => 'slug', 'label' => 'slug البراند', 'type' => 'text'],
                ['key' => 'image', 'label' => 'الصورة', 'type' => 'image'],
            ], [
                ['slug' => 'cuba', 'image' => 'assets/images/banners/202609024756snusegy_cuba.jpeg'],
                ['slug' => 'iceberg', 'image' => 'assets/images/banners/202609024656snusegy_iceberg.jpeg'],
                ['slug' => 'kick', 'image' => 'assets/images/banners/202609024849snusegy_kick.jpeg'],
                ['slug' => 'killa', 'image' => 'assets/images/products/202608260723snusegy_killa_cola.jpg'],
                ['slug' => 'pablo', 'image' => 'assets/images/banners/202609024454snusegy_pablo.jpeg'],
                ['slug' => 'swag', 'image' => 'assets/images/banners/202609024819snusegy_swag.jpeg'],
                ['slug' => 'velo', 'image' => 'assets/images/products/202608191942snusegy_velo_cool_peppermint.jpeg'],
                ['slug' => 'zyn', 'image' => 'assets/images/banners/202609024950snusegy_zyn.jpeg'],
            ], 70, 'تظهر إذا لم تكن صورة البراند مرفوعة من لوحة المنتجات.'),
            self::text('home', 'home.new_title', 'عنوان وصل حديثًا', 'وصل حديثًا', 80),
            self::text('home', 'home.new_subtitle', 'وصف وصل حديثًا', 'أحدث المنتجات المضافة إلى متجرنا', 90),
            self::text('home', 'home.featured_title', 'عنوان المنتجات المميزة', 'المنتجات المميزة', 100),
            self::text('home', 'home.featured_subtitle', 'وصف المنتجات المميزة', 'أفضل المنتجات الأكثر مبيعًا', 110),
            self::text('home', 'home.newsletter_title', 'عنوان النشرة', 'اشترك في نشرتنا البريدية', 120),
            self::textarea('home', 'home.newsletter_text', 'نص النشرة', 'احصل على أحدث العروض والخصومات مباشرة في بريدك الإلكتروني', 130),
            self::text('home', 'home.newsletter_placeholder', 'نص حقل البريد', 'بريدك الإلكتروني', 140),
            self::text('home', 'home.newsletter_button', 'زر الاشتراك', 'اشترك', 150),
            self::text('global', 'global.whatsapp_phone', 'رقم واتساب', '201055562743', 200, 'بالصيغة الدولية بدون + أو مسافات.'),
            self::textarea('global', 'global.whatsapp_message', 'رسالة واتساب', 'Hello SNUS Egypt, I would like to know more about your products.', 210),
            self::text('global', 'global.whatsapp_tooltip', 'تلميح واتساب', 'Chat with SNUS Egypt', 220),
            self::text('global', 'global.age_title', 'عنوان بوابة العمر', 'WELCOME TO', 230),
            self::text('global', 'global.age_brand', 'اسم المتجر في بوابة العمر', 'SNUS EGYPT', 240),
            self::textarea('global', 'global.age_text', 'نص بوابة العمر', 'This website contains nicotine products intended for adults aged 18 years or older.', 250),
            self::text('global', 'global.age_enter', 'زر الدخول', 'Enter Website', 260),
            self::text('global', 'global.age_leave', 'زر المغادرة', 'Leave Website', 270),
            self::text('global', 'global.age_leave_url', 'رابط المغادرة', 'https://google.com', 280),
        ];
    }

    public static function find(string $key): ?array
    {
        foreach (self::items() as $item) {
            if ($item['key'] === $key) {
                return $item;
            }
        }

        return null;
    }

    private static function text(string $group, string $key, string $label, string $value, int $sort, string $hint = ''): array
    {
        return compact('group', 'key', 'label', 'value', 'sort') + [
            'type' => 'text',
            'hint' => $hint,
            'item_fields' => [],
        ];
    }

    private static function textarea(string $group, string $key, string $label, string $value, int $sort, string $hint = ''): array
    {
        return compact('group', 'key', 'label', 'value', 'sort') + [
            'type' => 'textarea',
            'hint' => $hint,
            'item_fields' => [],
        ];
    }

    private static function list(string $group, string $key, string $label, array $fields, array $value, int $sort, string $hint = ''): array
    {
        return [
            'group' => $group,
            'key' => $key,
            'label' => $label,
            'type' => 'list',
            'hint' => $hint,
            'sort' => $sort,
            'item_fields' => $fields,
            'value' => $value,
        ];
    }

    private static function banner(string $title, string $image, string $brand = '', string $url = ''): array
    {
        return compact('title', 'image', 'brand', 'url');
    }
}
