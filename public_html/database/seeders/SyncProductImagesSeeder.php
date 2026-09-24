<?php

namespace Database\Seeders;

use App\Models\Admin\Gallary;
use App\Models\Admin\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use RuntimeException;

class SyncProductImagesSeeder extends Seeder
{
    public function run(): void
    {
        $sourceDirectory = base_path('../images');
        $destinationDirectory = public_path('assets/images/products');
        $bannerDirectory = public_path('assets/images/banners');

        if (! File::isDirectory($sourceDirectory)) {
            throw new RuntimeException("Product images directory was not found: {$sourceDirectory}");
        }

        File::ensureDirectoryExists($destinationDirectory);
        File::ensureDirectoryExists($bannerDirectory);

        $bannerFiles = [
            '202609024454snusegy_pablo.jpeg',
            '202609024656snusegy_iceberg.jpeg',
            '202609024756snusegy_cuba.jpeg',
            '202609024819snusegy_swag.jpeg',
            '202609024849snusegy_kick.jpeg',
            '202609024923snusegy_pablo_gold.jpeg',
            '202609024950snusegy_zyn.jpeg',
        ];

        foreach ($bannerFiles as $bannerFile) {
            $source = $sourceDirectory.'/'.$bannerFile;

            if (File::exists($source)) {
                File::copy($source, $bannerDirectory.'/'.$bannerFile);
            }
        }

        $imagesByProductSlug = collect(File::files($sourceDirectory))
            ->filter(function ($image): bool {
                $filename = $image->getFilename();

                return preg_match('/\.(jpe?g|png|webp)$/i', $filename) === 1
                    && preg_match('/^(large|medium|thumbnail)/i', $filename) !== 1
                    && str_contains(strtolower($filename), 'snusegy_');
            })
            ->sortBy(fn ($image) => $image->getFilename())
            ->groupBy(function ($image): string {
                $filenameWithoutExtension = pathinfo($image->getFilename(), PATHINFO_FILENAME);
                preg_match('/snusegy_(.+)$/i', $filenameWithoutExtension, $matches);

                return Str::slug($matches[1]);
            })
            ->map(fn ($matchingImages) => $matchingImages->first());

        $matched = 0;
        $unmatched = [];
        $imageAliases = [
            'swag-original-ii' => 'swag-original-2',
        ];

        Product::active()->orderBy('id')->each(function (Product $product) use (
            $imagesByProductSlug,
            $imageAliases,
            $destinationDirectory,
            &$matched,
            &$unmatched
        ): void {
            if (in_array(optional($product->brand)->brand_slug, [
                'swag', 'iceberg', 'killa', 'pablo', 'velo', 'cuba', 'kick', 'zyn',
            ], true)) {
                return;
            }

            $imageSlug = $imageAliases[$product->product_slug] ?? $product->product_slug;
            $image = $imagesByProductSlug->get($imageSlug);

            if (! $image) {
                $unmatched[] = $product->product_slug;

                return;
            }

            $filename = $image->getFilename();
            $destination = $destinationDirectory.'/'.$filename;

            File::copy($image->getPathname(), $destination);

            $gallery = Gallary::firstOrCreate(
                ['name' => $filename],
                ['extension' => strtolower($image->getExtension())]
            );

            $publicPath = 'assets/images/products/'.$filename;

            foreach (['large', 'medium', 'thumbnail'] as $type) {
                DB::table('gallary_detail')->updateOrInsert(
                    [
                        'gallary_id' => $gallery->id,
                        'gallary_type' => $type,
                    ],
                    ['path' => $publicPath]
                );
            }

            if ((int) $product->gallary_id !== (int) $gallery->id) {
                $product->update(['gallary_id' => $gallery->id]);
            }

            $matched++;
        });

        $this->command?->info("Assigned exact images to {$matched} products.");

        if ($unmatched !== []) {
            $this->command?->warn('No exact product image found for: '.implode(', ', $unmatched));
        }
    }
}
