<?php

// Configuration
$db_path = __DIR__ . '/database.sqlite';
$images_source = __DIR__ . '/../snusegy copy 2/';
$images_dest = __DIR__ . '/public/assets/images/products/';

// Create destination directory if not exists
if (!is_dir($images_dest)) {
    mkdir($images_dest, 0755, true);
}

// Connect to database
try {
    $db = new PDO('sqlite:' . $db_path);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get all product images
$images = glob($images_source . '*.{jpg,jpeg,png}', GLOB_BRACE);
$original_images = array_filter($images, function($img) {
    $basename = basename($img);
    return preg_match('/^[0-9]+snusegy_/', $basename) &&
           !preg_match('/^(thumbnail|medium|large)/', $basename);
});

sort($original_images);

// Product mappings with correct names, brands, and order
$products_data = [
    // VELO Products
    ['file' => 'velo_cool_peppermint', 'name' => 'Velo Cool Peppermint', 'brand' => 'Velo', 'price' => 150, 'order' => 1],
    ['file' => 'velo_cool_storm', 'name' => 'Velo Cool Storm', 'brand' => 'Velo', 'price' => 150, 'order' => 2],
    ['file' => 'velo_orange_spark', 'name' => 'Velo Orange Spark', 'brand' => 'Velo', 'price' => 150, 'order' => 3],
    ['file' => 'velo_tropical_mango', 'name' => 'Velo Tropical Mango', 'brand' => 'Velo', 'price' => 150, 'order' => 4],
    ['file' => 'velo_freeze', 'name' => 'Velo Freeze', 'brand' => 'Velo', 'price' => 150, 'order' => 5],
    ['file' => 'velo_lime_flame', 'name' => 'Velo Lime Flame', 'brand' => 'Velo', 'price' => 150, 'order' => 6],
    ['file' => 'velo_freezing_peppermint', 'name' => 'Velo Freezing Peppermint', 'brand' => 'Velo', 'price' => 150, 'order' => 7],
    ['file' => 'velo_crispy_peppermint', 'name' => 'Velo Crispy Peppermint', 'brand' => 'Velo', 'price' => 150, 'order' => 8],
    ['file' => 'velo_polar_mint', 'name' => 'Velo Polar Mint', 'brand' => 'Velo', 'price' => 150, 'order' => 9],
    ['file' => 'velo_tropical_breeze', 'name' => 'Velo Tropical Breeze', 'brand' => 'Velo', 'price' => 150, 'order' => 10],
    ['file' => 'velo_citrus_burst', 'name' => 'Velo Citrus Burst', 'brand' => 'Velo', 'price' => 150, 'order' => 11],
    ['file' => 'velo_mighty_peppermint', 'name' => 'Velo Mighty Peppermint', 'brand' => 'Velo', 'price' => 150, 'order' => 12],
    ['file' => 'velo_polar_mint_strong', 'name' => 'Velo Polar Mint Strong', 'brand' => 'Velo', 'price' => 150, 'order' => 13],
    ['file' => 'velo_ruby_berry_strong', 'name' => 'Velo Ruby Berry Strong', 'brand' => 'Velo', 'price' => 150, 'order' => 14],
    ['file' => 'velo_freeze_ultra', 'name' => 'Velo Freeze Ultra', 'brand' => 'Velo', 'price' => 150, 'order' => 15],
    ['file' => 'velo_tropical_breeze_strong', 'name' => 'Velo Tropical Breeze Strong', 'brand' => 'Velo', 'price' => 150, 'order' => 16],

    // PABLO Products
    ['file' => 'pablo_exclusive_strawberry_lychee', 'name' => 'Pablo Exclusive Strawberry Lychee', 'brand' => 'Pablo', 'price' => 200, 'order' => 17],
    ['file' => 'pablo_exclusive_mango_ice', 'name' => 'Pablo Exclusive Mango Ice', 'brand' => 'Pablo', 'price' => 200, 'order' => 18],
    ['file' => 'pablo_exclusive_kiwi', 'name' => 'Pablo Exclusive Kiwi', 'brand' => 'Pablo', 'price' => 200, 'order' => 19],
    ['file' => 'pablo_exclusive_banana_ice', 'name' => 'Pablo Exclusive Banana Ice', 'brand' => 'Pablo', 'price' => 200, 'order' => 20],
    ['file' => 'pablo_exclusive_grape_ice', 'name' => 'Pablo Exclusive Grape Ice', 'brand' => 'Pablo', 'price' => 200, 'order' => 21],
    ['file' => 'pablo_exclusive_frosted_ice', 'name' => 'Pablo Exclusive Frosted Ice', 'brand' => 'Pablo', 'price' => 200, 'order' => 22],
    ['file' => 'pablo_exclusive_red_berry', 'name' => 'Pablo Exclusive Red Berry', 'brand' => 'Pablo', 'price' => 200, 'order' => 23],
    ['file' => 'pablo_ice_cold', 'name' => 'Pablo Ice Cold', 'brand' => 'Pablo', 'price' => 200, 'order' => 24],
    ['file' => 'pablo_x_ice_cold', 'name' => 'Pablo X Ice Cold', 'brand' => 'Pablo', 'price' => 220, 'order' => 25],
    ['file' => 'pablo_exclusive_strawberry', 'name' => 'Pablo Exclusive Strawberry', 'brand' => 'Pablo', 'price' => 200, 'order' => 26],
    ['file' => 'pablo_passion_fruit', 'name' => 'Pablo Passion Fruit', 'brand' => 'Pablo', 'price' => 200, 'order' => 27],
    ['file' => 'pablo_cola', 'name' => 'Pablo Cola', 'brand' => 'Pablo', 'price' => 200, 'order' => 28],
    ['file' => 'pablo_peppermint', 'name' => 'Pablo Peppermint', 'brand' => 'Pablo', 'price' => 200, 'order' => 29],
    ['file' => 'pablo_pineapple', 'name' => 'Pablo Pineapple', 'brand' => 'Pablo', 'price' => 200, 'order' => 30],
    ['file' => 'pablo_blueberry_peach_ice', 'name' => 'Pablo Blueberry Peach Ice', 'brand' => 'Pablo', 'price' => 200, 'order' => 31],
    ['file' => 'pablo_exclusive_bubblegum', 'name' => 'Pablo Exclusive Bubblegum', 'brand' => 'Pablo', 'price' => 200, 'order' => 32],
    ['file' => 'pablo_strawberry', 'name' => 'Pablo Strawberry', 'brand' => 'Pablo', 'price' => 200, 'order' => 33],
    ['file' => 'pablo_ice_cold_neon', 'name' => 'Pablo Ice Cold Neon', 'brand' => 'Pablo', 'price' => 200, 'order' => 34],
    ['file' => 'pablo_banana_ice', 'name' => 'Pablo Banana Ice', 'brand' => 'Pablo', 'price' => 200, 'order' => 35],
    ['file' => 'pablo_exclusive_ice_cold', 'name' => 'Pablo Exclusive Ice Cold', 'brand' => 'Pablo', 'price' => 200, 'order' => 36],
    ['file' => 'pablo_exclusive_frosted_mint', 'name' => 'Pablo Exclusive Frosted Mint', 'brand' => 'Pablo', 'price' => 200, 'order' => 37],
    ['file' => 'pablo_exclusive_blue_ice', 'name' => 'Pablo Exclusive Blue Ice', 'brand' => 'Pablo', 'price' => 200, 'order' => 38],
    ['file' => 'pablo_exclusive_mixed_berry', 'name' => 'Pablo Exclusive Mixed Berry', 'brand' => 'Pablo', 'price' => 200, 'order' => 39],
    ['file' => 'pablo_exclusive_watermelon', 'name' => 'Pablo Exclusive Watermelon', 'brand' => 'Pablo', 'price' => 200, 'order' => 40],
    ['file' => 'pablo_exclusive_lemon_ice', 'name' => 'Pablo Exclusive Lemon Ice', 'brand' => 'Pablo', 'price' => 200, 'order' => 41],
    ['file' => 'pablo_exclusive_grape', 'name' => 'Pablo Exclusive Grape', 'brand' => 'Pablo', 'price' => 200, 'order' => 42],

    // PABLO GOLD EDITION
    ['file' => 'pablo_gold_edition_cola', 'name' => 'Pablo Gold Edition Cola', 'brand' => 'Pablo', 'price' => 250, 'order' => 43],
    ['file' => 'pablo_gold_edition_passion_fruit', 'name' => 'Pablo Gold Edition Passion Fruit', 'brand' => 'Pablo', 'price' => 250, 'order' => 44],
    ['file' => 'pablo_gold_edition_tropical_punch', 'name' => 'Pablo Gold Edition Tropical Punch', 'brand' => 'Pablo', 'price' => 250, 'order' => 45],

    // ICEBERG Products
    ['file' => 'iceberg_grape', 'name' => 'Iceberg Grape', 'brand' => 'Iceberg', 'price' => 180, 'order' => 46],
    ['file' => 'iceberg_green_mint', 'name' => 'Iceberg Green Mint', 'brand' => 'Iceberg', 'price' => 180, 'order' => 47],
    ['file' => 'iceberg_watermelon', 'name' => 'Iceberg Watermelon', 'brand' => 'Iceberg', 'price' => 180, 'order' => 48],
    ['file' => 'iceberg_bubblegum', 'name' => 'Iceberg Bubblegum', 'brand' => 'Iceberg', 'price' => 180, 'order' => 49],
    ['file' => 'iceberg_cola', 'name' => 'Iceberg Cola', 'brand' => 'Iceberg', 'price' => 180, 'order' => 50],
    ['file' => 'iceberg_mango', 'name' => 'Iceberg Mango', 'brand' => 'Iceberg', 'price' => 180, 'order' => 51],
    ['file' => 'iceberg_cherry', 'name' => 'Iceberg Cherry', 'brand' => 'Iceberg', 'price' => 180, 'order' => 52],
    ['file' => 'iceberg_strawberry', 'name' => 'Iceberg Strawberry', 'brand' => 'Iceberg', 'price' => 180, 'order' => 53],
    ['file' => 'iceberg_raspberry', 'name' => 'Iceberg Raspberry', 'brand' => 'Iceberg', 'price' => 180, 'order' => 54],
    ['file' => 'iceberg_arasaka_edition', 'name' => 'Iceberg Arasaka Edition', 'brand' => 'Iceberg', 'price' => 200, 'order' => 55],
    ['file' => 'iceberg_watermelon_mint', 'name' => 'Iceberg Watermelon Mint', 'brand' => 'Iceberg', 'price' => 180, 'order' => 56],
    ['file' => 'iceberg_cola_cherry', 'name' => 'Iceberg Cola Cherry', 'brand' => 'Iceberg', 'price' => 180, 'order' => 57],
    ['file' => 'iceberg_apple_mint', 'name' => 'Iceberg Apple Mint', 'brand' => 'Iceberg', 'price' => 180, 'order' => 58],
    ['file' => 'iceberg_mango_ice', 'name' => 'Iceberg Mango Ice', 'brand' => 'Iceberg', 'price' => 180, 'order' => 59],
    ['file' => 'iceberg_strawberry_ice', 'name' => 'Iceberg Strawberry Ice', 'brand' => 'Iceberg', 'price' => 180, 'order' => 60],
    ['file' => 'iceberg_cherry_cola', 'name' => 'Iceberg Cherry Cola', 'brand' => 'Iceberg', 'price' => 180, 'order' => 61],
    ['file' => 'iceberg_bubblegum_ice', 'name' => 'Iceberg Bubblegum Ice', 'brand' => 'Iceberg', 'price' => 180, 'order' => 62],
    ['file' => 'iceberg_watermelon_ice', 'name' => 'Iceberg Watermelon Ice', 'brand' => 'Iceberg', 'price' => 180, 'order' => 63],
    ['file' => 'iceberg_arasaka_cherry', 'name' => 'Iceberg Arasaka Cherry', 'brand' => 'Iceberg', 'price' => 200, 'order' => 64],
    ['file' => 'iceberg_raspberry_lemon', 'name' => 'Iceberg Raspberry Lemon', 'brand' => 'Iceberg', 'price' => 180, 'order' => 65],
    ['file' => 'iceberg_tropical_punch', 'name' => 'Iceberg Tropical Punch', 'brand' => 'Iceberg', 'price' => 180, 'order' => 66],
    ['file' => 'iceberg_passion_fruit', 'name' => 'Iceberg Passion Fruit', 'brand' => 'Iceberg', 'price' => 180, 'order' => 67],
    ['file' => 'iceberg_apple', 'name' => 'Iceberg Apple', 'brand' => 'Iceberg', 'price' => 180, 'order' => 68],

    // KILLA Products
    ['file' => 'killa_cola', 'name' => 'Killa Cola', 'brand' => 'Killa', 'price' => 190, 'order' => 69],
    ['file' => 'killa_cold_mint', 'name' => 'Killa Cold Mint', 'brand' => 'Killa', 'price' => 190, 'order' => 70],
    ['file' => 'killa_banana_ice', 'name' => 'Killa Banana Ice', 'brand' => 'Killa', 'price' => 190, 'order' => 71],
    ['file' => 'killa_watermelon', 'name' => 'Killa Watermelon', 'brand' => 'Killa', 'price' => 190, 'order' => 72],
    ['file' => 'killa_spearmint', 'name' => 'Killa Spearmint', 'brand' => 'Killa', 'price' => 190, 'order' => 73],
    ['file' => 'killa_cold_mint_extra_strong', 'name' => 'Killa Cold Mint Extra Strong', 'brand' => 'Killa', 'price' => 210, 'order' => 74],
    ['file' => 'killa_watermelon_ice', 'name' => 'Killa Watermelon Ice', 'brand' => 'Killa', 'price' => 190, 'order' => 75],
    ['file' => 'killa_cold_mint_extra', 'name' => 'Killa Cold Mint Extra', 'brand' => 'Killa', 'price' => 210, 'order' => 76],
    ['file' => 'killa_banana', 'name' => 'Killa Banana', 'brand' => 'Killa', 'price' => 190, 'order' => 77],
    ['file' => 'killa_spearmint_strong', 'name' => 'Killa Spearmint Strong', 'brand' => 'Killa', 'price' => 210, 'order' => 78],
    ['file' => 'killa_apple_mint', 'name' => 'Killa Apple Mint', 'brand' => 'Killa', 'price' => 190, 'order' => 79],
    ['file' => 'killa_watermelon_strong', 'name' => 'Killa Watermelon Strong', 'brand' => 'Killa', 'price' => 210, 'order' => 80],

    // SWAG Products
    ['file' => 'swag_minto', 'name' => 'Swag Minto', 'brand' => 'Swag', 'price' => 120, 'order' => 81],
    ['file' => 'swag_original', 'name' => 'Swag Original', 'brand' => 'Swag', 'price' => 120, 'order' => 82],
    ['file' => 'swag_catalog', 'name' => 'Swag Catalog', 'brand' => 'Swag', 'price' => 120, 'order' => 83],
    ['file' => 'swag_flavors', 'name' => 'Swag Flavors', 'brand' => 'Swag', 'price' => 120, 'order' => 84],
    ['file' => 'swag_original_2', 'name' => 'Swag Original II', 'brand' => 'Swag', 'price' => 120, 'order' => 85],

    // CUBA Products
    ['file' => 'cuba_ninja_strawberry', 'name' => 'Cuba Ninja Strawberry', 'brand' => 'Cuba', 'price' => 140, 'order' => 86],

    // KICK Energy Products
    ['file' => 'kick_energy_original', 'name' => 'Kick Energy Original', 'brand' => 'Kick', 'price' => 100, 'order' => 87],
    ['file' => 'kick_energy_mint', 'name' => 'Kick Energy Mint', 'brand' => 'Kick', 'price' => 100, 'order' => 88],
    ['file' => 'kick_energy_berry', 'name' => 'Kick Energy Berry', 'brand' => 'Kick', 'price' => 100, 'order' => 89],
    ['file' => 'kick_energy_citrus', 'name' => 'Kick Energy Citrus', 'brand' => 'Kick', 'price' => 100, 'order' => 90],
];

// Get or create brands
$brands = [];
$brand_names = array_unique(array_column($products_data, 'brand'));

foreach ($brand_names as $brand_name) {
    // Check if brand exists
    $stmt = $db->prepare("SELECT id FROM brands WHERE brand_slug = ?");
    $brand_slug = strtolower(str_replace(' ', '-', $brand_name));
    $stmt->execute([$brand_slug]);
    $brand = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$brand) {
        // Create brand
        $db->exec("INSERT INTO brands (name, brand_slug, status, created_at, updated_at)
                   VALUES ('{$brand_name}', '{$brand_slug}', 'active', datetime('now'), datetime('now'))");
        $brand_id = $db->lastInsertId();
    } else {
        $brand_id = $brand['id'];
    }

    $brands[$brand_name] = $brand_id;
}

echo "Brands created/found: " . count($brands) . "\n";

// Insert products
$inserted = 0;
$skipped = 0;

foreach ($products_data as $product) {
    // Find the image file
    $image_file = null;
    foreach ($original_images as $img) {
        if (strpos(basename($img), 'snusegy_' . $product['file']) !== false) {
            $image_file = $img;
            break;
        }
    }

    if (!$image_file || !file_exists($image_file)) {
        echo "Skipping {$product['name']} - image not found\n";
        $skipped++;
        continue;
    }

    // Copy image to destination
    $image_name = basename($image_file);
    $dest_path = $images_dest . $image_name;

    if (!file_exists($dest_path)) {
        copy($image_file, $dest_path);
    }

    // Create media record
    $extension = pathinfo($image_name, PATHINFO_EXTENSION);
    $db->exec("INSERT INTO media (name, extension, user_id, created_at, updated_at)
               VALUES ('{$image_name}', '{$extension}', 1, datetime('now'), datetime('now'))");
    $media_id = $db->lastInsertId();

    // Create media details (large, medium, thumbnail)
    foreach (['large', 'medium', 'thumbnail'] as $size) {
        $db->exec("INSERT INTO media_detail (media_id, media_type, path)
                   VALUES ({$media_id}, '{$size}', 'assets/images/products/{$image_name}')");
    }

    // Create product
    $product_slug = strtolower(str_replace(' ', '-', $product['name']));
    $brand_id = $brands[$product['brand']];

    $db->exec("INSERT INTO products (
        product_type, product_slug, media_id, price, product_status, brand_id,
        product_view, is_featured, created_at, updated_at
    ) VALUES (
        'simple', '{$product_slug}', {$media_id}, {$product['price']}, 'active', {$brand_id},
        0, 0, datetime('now'), datetime('now')
    )");
    $product_id = $db->lastInsertId();

    // Create product detail
    $db->exec("INSERT INTO product_detail (product_id, title, language_id)
               VALUES ({$product_id}, '{$product['name']}', 1)");

    echo "Added: {$product['name']} (Order: {$product['order']})\n";
    $inserted++;
}

echo "\n=== Summary ===\n";
echo "Products inserted: {$inserted}\n";
echo "Products skipped: {$skipped}\n";
echo "Total brands: " . count($brands) . "\n";
