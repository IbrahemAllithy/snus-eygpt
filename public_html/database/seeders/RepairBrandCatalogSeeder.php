<?php

namespace Database\Seeders;

use App\Models\Admin\Brand;
use App\Models\Admin\Gallary;
use App\Models\Admin\Product;
use App\Models\Admin\ProductDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use RuntimeException;

class RepairBrandCatalogSeeder extends Seeder
{
    private string $sourceDirectory;

    private string $productDirectory;

    public function run(): void
    {
        $this->sourceDirectory = base_path('../images');
        $this->productDirectory = public_path('assets/images/products');

        File::ensureDirectoryExists($this->productDirectory);

        $this->repairSwag();
        $this->repairIceberg();
        $this->repairKilla();
        $this->repairPablo();
        $this->repairVelo();
        $this->repairCuba();
        $this->repairKick();
        $this->repairZyn();
        $this->disableBrandsWithoutProductImages();

        $this->command?->info('Repaired all brand catalogs using the brands and flavors shown inside each image.');
    }

    private function repairSwag(): void
    {
        $brand = Brand::where('brand_slug', 'swag')->firstOrFail();
        $products = Product::where('brand_id', $brand->id)->orderBy('id')->get();

        $flavors = [
            ['name' => 'Swag Cappuccino', 'slug' => 'swag-cappuccino', 'crop' => [120, 325, 270, 300]],
            ['name' => 'Swag Minto', 'slug' => 'swag-minto', 'crop' => [380, 325, 270, 300]],
            ['name' => 'Swag Mojito Lime', 'slug' => 'swag-mojito-lime', 'crop' => [645, 325, 270, 300]],
            ['name' => 'Swag Fresh Red', 'slug' => 'swag-fresh-red', 'crop' => [120, 580, 270, 300]],
            ['name' => 'Swag Elderflower', 'slug' => 'swag-elderflower', 'crop' => [380, 580, 270, 300]],
            ['name' => 'Swag Ice Grape', 'slug' => 'swag-ice-grape', 'crop' => [645, 580, 270, 300]],
        ];

        $source = $this->sourceDirectory.'/202608263205snusegy_swag_flavors.jpeg';
        if (! File::exists($source)) {
            throw new RuntimeException('The Swag flavors source image was not found.');
        }

        $categoryIds = DB::table('product_category')
            ->where('product_id', optional($products->first())->id)
            ->pluck('category_id');

        foreach ($flavors as $index => $flavor) {
            $filename = str_replace('-', '_', $flavor['slug']).'.jpg';
            $this->cropImage($source, $this->productDirectory.'/'.$filename, $flavor['crop']);

            $product = $products->get($index);
            if (! $product) {
                $gallery = $this->galleryFor($filename);
                $product = Product::create([
                    'product_type' => 'simple',
                    'product_slug' => $flavor['slug'],
                    'gallary_id' => $gallery->id,
                    'price' => 400,
                    'discount_price' => 250,
                    'product_status' => 'active',
                    'brand_id' => $brand->id,
                    'is_featured' => 0,
                    'product_view' => 0,
                ]);
            }

            $this->configureProduct($product, $flavor['name'], $flavor['slug'], $filename);

            foreach ($categoryIds as $categoryId) {
                DB::table('product_category')->updateOrInsert([
                    'product_id' => $product->id,
                    'category_id' => $categoryId,
                ]);
            }
        }

        Product::where('brand_id', $brand->id)
            ->whereNotIn('id', Product::where('brand_id', $brand->id)->orderBy('id')->limit(6)->pluck('id'))
            ->update(['product_status' => 'inactive']);
    }

    private function repairIceberg(): void
    {
        $this->repairExistingBrandProducts('iceberg', [
            ['id' => 46, 'name' => 'Iceberg Grape', 'slug' => 'iceberg-grape', 'image' => '202608254330snusegy_iceberg_grape.jpeg'],
            ['id' => 55, 'name' => 'Iceberg Arasaka Edition', 'slug' => 'iceberg-arasaka-edition', 'image' => '202608283440snusegy_pablo_exclusive_ice_cold.jpeg'],
            ['id' => 56, 'name' => 'Iceberg Watermelon Mint', 'slug' => 'iceberg-watermelon-mint', 'image' => '202608283546snusegy_pablo_exclusive_frosted_mint.jpeg'],
            ['id' => 59, 'name' => 'Iceberg Sour Berries', 'slug' => 'iceberg-sour-berries', 'image' => '202608283736snusegy_pablo_exclusive_blue_ice.jpeg'],
            ['id' => 62, 'name' => 'Iceberg Bubble Gum', 'slug' => 'iceberg-bubble-gum', 'image' => '202608283843snusegy_pablo_exclusive_mixed_berry.jpeg'],
            ['id' => 63, 'name' => 'Iceberg Energy', 'slug' => 'iceberg-energy', 'image' => '202608283915snusegy_pablo_exclusive_watermelon.jpeg'],
            ['id' => 67, 'name' => 'Iceberg Black', 'slug' => 'iceberg-black', 'image' => '202608284024snusegy_pablo_exclusive_lemon_ice.jpeg'],
            ['id' => 68, 'name' => 'Iceberg Original', 'slug' => 'iceberg-original', 'image' => '202609025047snusegy_killa_watermelon_ice.jpeg'],
        ]);
    }

    private function repairKilla(): void
    {
        $this->repairExistingBrandProducts('killa', [
            ['id' => 69, 'name' => 'Killa Cola', 'slug' => 'killa-cola', 'image' => '202608260723snusegy_killa_cola.jpg'],
            ['id' => 70, 'name' => 'Killa Green Mint', 'slug' => 'killa-green-mint', 'image' => '202608263407snusegy_iceberg_green_mint.jpeg'],
            ['id' => 71, 'name' => 'Killa Blue Raspberry', 'slug' => 'killa-blue-raspberry', 'image' => '202608263543snusegy_iceberg_watermelon.jpeg'],
            ['id' => 72, 'name' => 'Killa Blueberry', 'slug' => 'killa-blueberry', 'image' => '202608263638snusegy_iceberg_bubblegum.jpeg'],
            ['id' => 73, 'name' => 'Killa Cold Mint', 'slug' => 'killa-cold-mint', 'image' => '202608263736snusegy_iceberg_cola.jpeg'],
            ['id' => 74, 'name' => 'Killa Spearmint', 'slug' => 'killa-spearmint', 'image' => '202608263816snusegy_iceberg_mango.jpeg'],
            ['id' => 75, 'name' => 'Killa Bubblegum', 'slug' => 'killa-bubblegum', 'image' => '202608263912snusegy_iceberg_cherry.jpeg'],
            ['id' => 76, 'name' => 'Killa Tropical Punch', 'slug' => 'killa-tropical-punch', 'image' => '202608264021snusegy_iceberg_strawberry.jpeg'],
            ['id' => 77, 'name' => 'Killa Energy', 'slug' => 'killa-energy', 'image' => '202608264157snusegy_iceberg_raspberry.jpeg'],
            ['id' => 78, 'name' => 'Killa Cold Mint Extra', 'slug' => 'killa-cold-mint-extra', 'image' => '202609025154snusegy_killa_cold_mint_extra.jpeg'],
            ['id' => 79, 'name' => 'Killa Apple', 'slug' => 'killa-apple', 'image' => '202608264557snusegy_killa_watermelon.jpg'],
        ]);
    }

    private function repairPablo(): void
    {
        $this->repairFlexibleBrandCatalog('pablo', [
            ['id' => 17, 'name' => 'Pablo Exclusive Blueberry Cranberry Cherry', 'slug' => 'pablo-exclusive-blueberry-cranberry-cherry', 'image' => '2026082026070snusegy_pablo_exclusive_strawberry_lychee.jpg'],
            ['id' => 18, 'name' => 'Pablo Exclusive Strawberry Watermelon', 'slug' => 'pablo-exclusive-strawberry-watermelon', 'image' => '2026082031344snusegy_pablo_exclusive_mango_ice.jpg'],
            ['id' => 19, 'name' => 'Pablo Exclusive Pink Lemonade', 'slug' => 'pablo-exclusive-pink-lemonade', 'image' => '2026082032195snusegy_pablo_exclusive_kiwi.jpg'],
            ['id' => 20, 'name' => 'Pablo Exclusive Blue Raspberry', 'slug' => 'pablo-exclusive-blue-raspberry', 'image' => '2026082046380412676snusegy_pablo_exclusive_banana_ice.jpg'],
            ['id' => 21, 'name' => 'Pablo Exclusive Tropical Punch', 'slug' => 'pablo-exclusive-tropical-punch', 'image' => '2026082049279snusegy_pablo_exclusive_grape_ice.jpg'],
            ['id' => 22, 'name' => 'Pablo Exclusive Watermelon', 'slug' => 'pablo-exclusive-watermelon', 'image' => '20260820500636snusegy_pablo_exclusive_frosted_ice.jpg'],
            ['id' => 23, 'name' => 'Pablo Exclusive Frosted Mint', 'slug' => 'pablo-exclusive-frosted-mint', 'image' => '20260820503255snusegy_pablo_exclusive_red_berry.jpg'],
            ['id' => 24, 'name' => 'Pablo Exclusive Frosted Ice', 'slug' => 'pablo-exclusive-frosted-ice', 'image' => '20260820513056snusegy_pablo_ice_cold.jpg'],
            ['id' => 25, 'name' => 'Pablo Exclusive Bubblegum', 'slug' => 'pablo-exclusive-bubblegum', 'image' => '202608205429494snusegy_pablo_x_ice_cold.jpg'],
            ['id' => 26, 'name' => 'Pablo Exclusive Orange', 'slug' => 'pablo-exclusive-orange', 'image' => '202608205520873snusegy_pablo_exclusive_strawberry.jpg'],
            ['id' => 27, 'name' => 'Pablo Exclusive Passion Fruit', 'slug' => 'pablo-exclusive-passion-fruit', 'image' => '202608205712snusegy_pablo_passion_fruit.jpg'],
            ['id' => 28, 'name' => 'Pablo Exclusive Cola', 'slug' => 'pablo-exclusive-cola', 'image' => '202608205815snusegy_pablo_cola.jpg'],
            ['id' => 29, 'name' => 'Pablo Silver Peppermint', 'slug' => 'pablo-silver-peppermint', 'image' => '202608250141snusegy_pablo_peppermint.jpeg'],
            ['id' => 30, 'name' => 'Pablo Silver Pineapple', 'slug' => 'pablo-silver-pineapple', 'image' => '202608253446snusegy_pablo_pineapple.jpeg'],
            ['id' => 31, 'name' => 'Pablo Silver Blueberry Peach Ice', 'slug' => 'pablo-silver-blueberry-peach-ice', 'image' => '202608254006snusegy_pablo_blueberry_peach_ice.jpeg'],
            ['id' => 32, 'name' => 'Pablo Gold Frosted Mint', 'slug' => 'pablo-gold-frosted-mint', 'image' => '2026082556190snusegy_pablo_exclusive_bubblegum.jpg'],
            ['id' => 33, 'name' => 'Pablo Exclusive Strawberry Lychee', 'slug' => 'pablo-exclusive-strawberry-lychee', 'image' => '20260828083871snusegy_killa_cold_mint_extra_strong.jpg'],
            ['id' => 34, 'name' => 'Pablo Gold Pineapple', 'slug' => 'pablo-gold-pineapple', 'image' => '202608262417560snusegy_killa_cold_mint.jpg'],
            ['id' => 35, 'name' => 'Pablo Gold Blueberry Peach Ice', 'slug' => 'pablo-gold-blueberry-peach-ice', 'image' => '202608262448718snusegy_killa_banana_ice.jpg'],
            ['id' => 43, 'name' => 'Pablo Gold Cola', 'slug' => 'pablo-gold-cola', 'image' => '202608260952snusegy_pablo_gold_edition_cola.jpg'],
            ['id' => 44, 'name' => 'Pablo Gold Passion Fruit', 'slug' => 'pablo-gold-passion-fruit', 'image' => '202608262118snusegy_pablo_gold_edition_passion_fruit.jpg'],
            ['id' => 45, 'name' => 'Pablo Gold Tropical Punch', 'slug' => 'pablo-gold-tropical-punch', 'image' => '202608263251snusegy_pablo_gold_edition_tropical_punch.jpg'],
        ]);
    }

    private function repairVelo(): void
    {
        $this->repairFlexibleBrandCatalog('velo', [
            ['id' => 1, 'name' => 'Velo Cool Peppermint', 'slug' => 'velo-cool-peppermint', 'image' => '202608191942snusegy_velo_cool_peppermint.jpeg'],
            ['id' => 5, 'name' => 'Velo Cool Storm', 'slug' => 'velo-cool-storm', 'image' => '202608192355snusegy_velo_cool_storm.jpeg'],
            ['id' => 8, 'name' => 'Velo Orange Spark', 'slug' => 'velo-orange-spark', 'image' => '202608192419snusegy_velo_orange_spark.jpeg'],
            ['id' => 9, 'name' => 'Velo Tropical Mango', 'slug' => 'velo-tropical-mango', 'image' => '202608192437snusegy_velo_tropical_mango.jpeg'],
            ['id' => 10, 'name' => 'Velo Lime Flame', 'slug' => 'velo-lime-flame', 'image' => '202608192516snusegy_velo_lime_flame.jpeg'],
            ['id' => 11, 'name' => 'Velo Freezing Peppermint', 'slug' => 'velo-freezing-peppermint', 'image' => '202608194539snusegy_velo_freezing_peppermint.jpeg'],
            ['id' => 12, 'name' => 'Velo Crispy Peppermint', 'slug' => 'velo-crispy-peppermint', 'image' => '202608195840snusegy_velo_crispy_peppermint.jpeg'],
            ['id' => 13, 'name' => 'Velo Original', 'slug' => 'velo-original', 'image' => '202609025209snusegy_killa_banana.jpeg'],
        ]);
    }

    private function repairCuba(): void
    {
        $this->repairFlexibleBrandCatalog('cuba', [
            ['id' => 86, 'name' => 'Cuba Ninja Strawberry', 'slug' => 'cuba-ninja-strawberry', 'image' => '202608032731snusegy_cuba_ninja_strawberry.png'],
            ['name' => 'Cuba Forest Berries', 'slug' => 'cuba-forest-berries', 'image' => '202608282822snusegy_iceberg_arasaka_edition.jpeg'],
            ['name' => 'Cuba Black Currant', 'slug' => 'cuba-black-currant', 'image' => '202608282859snusegy_iceberg_watermelon_mint.jpeg'],
            ['name' => 'Cuba Cherry', 'slug' => 'cuba-cherry', 'image' => '202608282930snusegy_iceberg_cola_cherry.jpeg'],
            ['name' => 'Cuba Raspberry', 'slug' => 'cuba-raspberry', 'image' => '202608283015snusegy_iceberg_apple_mint.jpeg'],
            ['name' => 'Cuba Mango', 'slug' => 'cuba-mango', 'image' => '202608283122snusegy_iceberg_mango_ice.jpeg'],
            ['name' => 'Cuba Lollipop', 'slug' => 'cuba-lollipop', 'image' => '202608283204snusegy_iceberg_strawberry_ice.jpeg'],
            ['name' => 'Cuba Blueberry', 'slug' => 'cuba-blueberry', 'image' => '202608283251snusegy_iceberg_cherry_cola.jpeg'],
            ['name' => 'Cuba Ice Spearmint', 'slug' => 'cuba-ice-spearmint', 'image' => '202608283346snusegy_iceberg_bubblegum_ice.jpeg'],
            ['name' => 'Cuba Banana Hit', 'slug' => 'cuba-banana-hit', 'image' => '202608283430snusegy_iceberg_grape.jpeg'],
            ['name' => 'Cuba Watermelon', 'slug' => 'cuba-watermelon', 'image' => '202608283519snusegy_iceberg_watermelon_ice.jpeg'],
            ['name' => 'Cuba Peach', 'slug' => 'cuba-peach', 'image' => '202608283550snusegy_iceberg_arasaka_cherry.jpeg'],
            ['name' => 'Cuba Double Fresh', 'slug' => 'cuba-double-fresh', 'image' => '202608283645snusegy_iceberg_raspberry_lemon.jpeg'],
            ['name' => 'Cuba Tropical Fruit', 'slug' => 'cuba-tropical-fruit', 'image' => '202608283806snusegy_iceberg_tropical_punch.jpeg'],
            ['name' => 'Cuba Cold Dry', 'slug' => 'cuba-cold-dry', 'image' => '202608283850snusegy_iceberg_passion_fruit.jpeg'],
        ]);
    }

    private function repairKick(): void
    {
        $this->repairFlexibleBrandCatalog('kick', [
            ['id' => 87, 'name' => 'Kick Original', 'slug' => 'kick-original', 'generated' => 'kick_original.jpg', 'source' => '202609024849snusegy_kick.jpeg', 'crop' => [130, 460, 270, 285]],
            ['id' => 88, 'name' => 'Kick Mint', 'slug' => 'kick-mint', 'generated' => 'kick_mint.jpg', 'source' => '202609024849snusegy_kick.jpeg', 'crop' => [300, 590, 285, 300]],
            ['id' => 89, 'name' => 'Kick Berry', 'slug' => 'kick-berry', 'generated' => 'kick_berry.jpg', 'source' => '202609024849snusegy_kick.jpeg', 'crop' => [360, 380, 260, 270]],
            ['id' => 90, 'name' => 'Kick Citrus', 'slug' => 'kick-citrus', 'generated' => 'kick_citrus.jpg', 'source' => '202609024849snusegy_kick.jpeg', 'crop' => [550, 420, 245, 275]],
        ]);
    }

    private function repairZyn(): void
    {
        $this->repairFlexibleBrandCatalog('zyn', [
            ['id' => 2, 'name' => 'ZYN Red Fruits', 'slug' => 'zyn-red-fruits', 'generated' => 'zyn_red_fruits.jpg', 'source' => '202609024950snusegy_zyn.jpeg', 'crop' => [15, 295, 190, 220]],
            ['id' => 6, 'name' => 'ZYN Spearmint', 'slug' => 'zyn-spearmint', 'generated' => 'zyn_spearmint.jpg', 'source' => '202609024950snusegy_zyn.jpeg', 'crop' => [165, 295, 205, 220]],
            ['name' => 'ZYN Cool Mint X-Strong', 'slug' => 'zyn-cool-mint-x-strong', 'generated' => 'zyn_cool_mint_x_strong.jpg', 'source' => '202609024950snusegy_zyn.jpeg', 'crop' => [335, 295, 205, 220]],
            ['name' => 'ZYN Icy Blackcurrant', 'slug' => 'zyn-icy-blackcurrant', 'generated' => 'zyn_icy_blackcurrant.jpg', 'source' => '202609024950snusegy_zyn.jpeg', 'crop' => [500, 295, 205, 220]],
            ['name' => 'ZYN Icy Mint', 'slug' => 'zyn-icy-mint', 'generated' => 'zyn_icy_mint.jpg', 'source' => '202609024950snusegy_zyn.jpeg', 'crop' => [665, 295, 205, 220]],
            ['name' => 'ZYN Cool Mint Max', 'slug' => 'zyn-cool-mint-max', 'generated' => 'zyn_cool_mint_max.jpg', 'source' => '202609024950snusegy_zyn.jpeg', 'crop' => [820, 295, 200, 220]],
        ]);
    }

    private function disableBrandsWithoutProductImages(): void
    {
        $brandIds = Brand::whereIn('brand_slug', ['nordic-spirit', 'siberia'])->pluck('id');
        Product::whereIn('brand_id', $brandIds)->update(['product_status' => 'inactive']);
    }

    private function repairFlexibleBrandCatalog(string $brandSlug, array $catalog): void
    {
        $brands = Brand::where('brand_slug', $brandSlug)->orderBy('id')->get();
        $brand = $brands->firstOrFail();
        $brandIds = $brands->pluck('id');
        $products = Product::whereIn('brand_id', $brandIds)->orderBy('id')->get();
        $categoryIds = DB::table('product_category')
            ->where('product_id', optional($products->first())->id)
            ->pluck('category_id');

        Product::whereIn('brand_id', $brandIds)->update(['product_status' => 'inactive']);
        foreach ($products as $product) {
            $product->update(['product_slug' => "catalog-repair-{$brandSlug}-{$product->id}"]);
        }
        $activeIds = [];

        foreach ($catalog as $index => $item) {
            $filename = $item['image'] ?? $item['generated'];

            if (isset($item['crop'])) {
                $source = $this->sourceDirectory.'/'.$item['source'];
                $this->cropImage($source, $this->productDirectory.'/'.$filename, $item['crop']);
            } else {
                $source = $this->sourceDirectory.'/'.$filename;
                if (! File::exists($source)) {
                    throw new RuntimeException("Product image was not found: {$filename}");
                }
                File::copy($source, $this->productDirectory.'/'.$filename);
            }

            $gallery = $this->galleryFor($filename);
            $product = isset($item['id']) ? Product::find($item['id']) : $products->get($index);

            if (! $product || ! $brandIds->contains($product->brand_id)) {
                $product = Product::create([
                    'product_type' => 'simple',
                    'product_slug' => $item['slug'],
                    'gallary_id' => $gallery->id,
                    'price' => 550,
                    'discount_price' => 450,
                    'product_status' => 'active',
                    'brand_id' => $brand->id,
                    'is_featured' => 0,
                    'product_view' => 0,
                ]);
            }

            $product->update(['brand_id' => $brand->id]);
            $this->configureProduct($product, $item['name'], $item['slug'], $filename);
            $activeIds[] = $product->id;

            foreach ($categoryIds as $categoryId) {
                DB::table('product_category')->updateOrInsert([
                    'product_id' => $product->id,
                    'category_id' => $categoryId,
                ]);
            }
        }

        Product::whereIn('brand_id', $brandIds)
            ->whereNotIn('id', $activeIds)
            ->update(['product_status' => 'inactive']);
    }

    private function repairExistingBrandProducts(string $brandSlug, array $catalog): void
    {
        $brand = Brand::where('brand_slug', $brandSlug)->firstOrFail();
        $activeIds = collect($catalog)->pluck('id');

        Product::where('brand_id', $brand->id)->update(['product_status' => 'inactive']);

        foreach ($catalog as $item) {
            $product = Product::where('id', $item['id'])->where('brand_id', $brand->id)->firstOrFail();
            $source = $this->sourceDirectory.'/'.$item['image'];

            if (! File::exists($source)) {
                throw new RuntimeException("Product image was not found: {$item['image']}");
            }

            File::copy($source, $this->productDirectory.'/'.$item['image']);
            $this->configureProduct($product, $item['name'], $item['slug'], $item['image']);
        }

        Product::where('brand_id', $brand->id)
            ->whereNotIn('id', $activeIds)
            ->update(['product_status' => 'inactive']);
    }

    private function configureProduct(Product $product, string $name, string $slug, string $filename): void
    {
        $gallery = $this->galleryFor($filename);

        $isSwag = str_starts_with($slug, 'swag-');
        $product->update([
            'product_slug' => $slug,
            'gallary_id' => $gallery->id,
            'product_status' => 'active',
            'price' => $slug === 'swag-fresh-red' ? 450 : ($isSwag ? 400 : 550),
            'discount_price' => $isSwag ? 250 : 450,
        ]);

        $languageIds = DB::table('languages')->where('status', 'active')->pluck('id');
        foreach ($languageIds as $languageId) {
            ProductDetail::updateOrCreate(
                ['product_id' => $product->id, 'language_id' => $languageId],
                [
                    'title' => $name,
                    'desc' => "Discover {$name}, an original nicotine pouch product available from Snus Egypt.",
                ]
            );
        }
    }

    private function galleryFor(string $filename): Gallary
    {
        $gallery = Gallary::firstOrCreate(
            ['name' => $filename],
            ['extension' => strtolower(pathinfo($filename, PATHINFO_EXTENSION))]
        );

        foreach (['large', 'medium', 'thumbnail'] as $type) {
            DB::table('gallary_detail')->updateOrInsert(
                ['gallary_id' => $gallery->id, 'gallary_type' => $type],
                ['path' => 'assets/images/products/'.$filename]
            );
        }

        return $gallery;
    }

    private function cropImage(string $source, string $destination, array $crop): void
    {
        [$x, $y, $width, $height] = $crop;
        $image = imagecreatefromstring(File::get($source));
        $cropped = imagecrop($image, compact('x', 'y', 'width', 'height'));

        if (! $cropped) {
            imagedestroy($image);
            throw new RuntimeException('Unable to crop the Swag flavors image.');
        }

        $canvas = imagecreatetruecolor(700, 700);
        $white = imagecolorallocate($canvas, 255, 255, 255);
        imagefill($canvas, 0, 0, $white);
        imagecopyresampled($canvas, $cropped, 0, 0, 0, 0, 700, 700, imagesx($cropped), imagesy($cropped));
        imagejpeg($canvas, $destination, 92);

        imagedestroy($canvas);
        imagedestroy($cropped);
        imagedestroy($image);
    }
}
