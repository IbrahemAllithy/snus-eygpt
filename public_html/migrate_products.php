<?php
// Migration script to move products from SQLite to MySQL
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Connect to SQLite
$sqlite = new PDO('sqlite:database.sqlite');
$sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get MySQL connection
$mysql = DB::connection()->getPdo();

echo "Starting migration from SQLite to MySQL...\n\n";

// Get all products from SQLite
$products = $sqlite->query("
    SELECT p.*, m.name as media_name
    FROM products p
    LEFT JOIN media m ON p.media_id = m.id
    WHERE p.id > 7
    ORDER BY p.id
")->fetchAll(PDO::FETCH_ASSOC);

echo "Found " . count($products) . " products to migrate\n\n";

foreach ($products as $product) {
    try {
        // Check if gallary exists in MySQL (MySQL uses 'gallary' instead of 'media')
        $gallaryId = null;
        if ($product['media_name']) {
            $stmt = $mysql->prepare("SELECT id FROM gallary WHERE name = ?");
            $stmt->execute([$product['media_name']]);
            $gallary = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($gallary) {
                $gallaryId = $gallary['id'];
            } else {
                // Get media details from SQLite
                $mediaStmt = $sqlite->prepare("SELECT * FROM media WHERE id = ?");
                $mediaStmt->execute([$product['media_id']]);
                $mediaData = $mediaStmt->fetch(PDO::FETCH_ASSOC);

                if ($mediaData) {
                    // Get extension from name
                    $extension = pathinfo($mediaData['name'], PATHINFO_EXTENSION);

                    // Insert into gallary table (MySQL)
                    $insertGallary = $mysql->prepare("
                        INSERT INTO gallary (name, extension, created_at, updated_at)
                        VALUES (?, ?, ?, ?)
                    ");
                    $insertGallary->execute([
                        $mediaData['name'],
                        $extension,
                        $mediaData['created_at'],
                        $mediaData['updated_at']
                    ]);
                    $gallaryId = $mysql->lastInsertId();
                    echo "  ✓ Gallary created: {$mediaData['name']}\n";

                    // Insert gallary_detail records
                    $mediaDetails = $sqlite->prepare("SELECT * FROM media_detail WHERE media_id = ?");
                    $mediaDetails->execute([$product['media_id']]);
                    foreach ($mediaDetails->fetchAll(PDO::FETCH_ASSOC) as $detail) {
                        $insertGallaryDetail = $mysql->prepare("
                            INSERT INTO gallary_detail (gallary_id, gallary_type, height, width, path)
                            VALUES (?, ?, ?, ?, ?)
                        ");
                        $insertGallaryDetail->execute([
                            $gallaryId,
                            $detail['media_type'],
                            $detail['height'],
                            $detail['width'],
                            $detail['path']
                        ]);
                    }
                }
            }
        }

        // Insert product to MySQL (gallary_id is used instead of media_id)
        $insertProduct = $mysql->prepare("
            INSERT INTO products (
                id, product_type, product_slug, price, discount_price,
                product_status, is_featured, brand_id, tax_id, gallary_id,
                product_view, created_at, updated_at
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $insertProduct->execute([
            $product['id'],
            $product['product_type'],
            $product['product_slug'],
            $product['price'],
            $product['discount_price'],
            $product['product_status'],
            $product['is_featured'] ?? 0,
            $product['brand_id'],
            $product['tax_id'],
            $gallaryId ?? 1, // Default to 1 if no gallary
            $product['product_view'] ?? 0,
            $product['created_at'],
            $product['updated_at']
        ]);

        echo "✓ Product {$product['id']} migrated\n";

        // Migrate product details
        $details = $sqlite->query("
            SELECT * FROM product_detail WHERE product_id = {$product['id']}
        ")->fetchAll(PDO::FETCH_ASSOC);

        foreach ($details as $detail) {
            $insertDetail = $mysql->prepare("
                INSERT INTO product_detail (
                    product_id, language_id, title, `desc`
                ) VALUES (?, ?, ?, ?)
            ");

            $insertDetail->execute([
                $detail['product_id'],
                $detail['language_id'],
                $detail['title'],
                $detail['desc'] ?? ''
            ]);
        }

        // Migrate product categories
        $categories = $sqlite->query("
            SELECT * FROM product_category WHERE product_id = {$product['id']}
        ")->fetchAll(PDO::FETCH_ASSOC);

        foreach ($categories as $category) {
            $insertCat = $mysql->prepare("
                INSERT INTO product_category (product_id, category_id, created_at, updated_at)
                VALUES (?, ?, ?, ?)
            ");

            $insertCat->execute([
                $category['product_id'],
                $category['category_id'],
                $category['created_at'],
                $category['updated_at']
            ]);
        }

    } catch (Exception $e) {
        echo "✗ Error migrating product {$product['id']}: " . $e->getMessage() . "\n";
    }
}

echo "\n✅ Migration completed!\n";
