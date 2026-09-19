<?php
// Test products display
$db = new PDO('sqlite:' . __DIR__ . '/database.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "
    SELECT
        p.id,
        p.product_slug,
        p.price,
        pd.title,
        b.name as brand_name,
        md.path as image_path
    FROM products p
    LEFT JOIN product_detail pd ON p.id = pd.product_id
    LEFT JOIN brands b ON p.brand_id = b.id
    LEFT JOIN media m ON p.media_id = m.id
    LEFT JOIN media_detail md ON m.id = md.media_id AND md.media_type = 'large'
    ORDER BY b.name, p.id
";

$products = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المنتجات - Snus Egypt</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0A0D12;
            color: #fff;
            padding: 2rem;
        }
        h1 {
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            margin-bottom: 2rem;
            text-align: center;
            letter-spacing: -0.02em;
        }
        .stats {
            background: #0F131C;
            padding: 1.5rem;
            border-radius: 999px;
            margin-bottom: 2rem;
            text-align: center;
        }
        .brand-section {
            margin-bottom: 3rem;
        }
        .brand-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            padding: 1rem;
            background: #161D2B;
            border-radius: 12px;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        .product-card {
            background: #0F131C;
            border-radius: 16px;
            padding: 1rem;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: translateY(-4px);
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: contain;
            background: #161D2B;
            border-radius: 12px;
            margin-bottom: 1rem;
        }
        .product-name {
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
            min-height: 2.5rem;
        }
        .product-price {
            color: #38BDF8;
            font-size: 1.1rem;
            font-weight: 600;
        }
        .no-image {
            background: #161D2B;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>🇪🇬 Snus Egypt - عرض المنتجات</h1>

    <div class="stats">
        <strong><?php echo count($products); ?></strong> منتج متاح
    </div>

    <?php
    $current_brand = '';
    foreach ($products as $product) {
        if ($current_brand != $product['brand_name']) {
            if ($current_brand != '') echo '</div></div>';
            $current_brand = $product['brand_name'];
            echo '<div class="brand-section">';
            echo '<h2 class="brand-title">' . htmlspecialchars($current_brand) . '</h2>';
            echo '<div class="products-grid">';
        }

        echo '<div class="product-card">';
        if ($product['image_path']) {
            // Add leading slash to make path absolute from root
            $image_url = '/' . $product['image_path'];
            echo '<img src="' . htmlspecialchars($image_url) . '"
                       alt="' . htmlspecialchars($product['title']) . '"
                       class="product-image"
                       onerror="this.parentElement.innerHTML=\'<div class=\\\'product-image no-image\\\'>لا توجد صورة</div>\'">';
        } else {
            echo '<div class="product-image no-image">لا توجد صورة</div>';
        }
        echo '<div class="product-name">' . htmlspecialchars($product['title']) . '</div>';
        echo '<div class="product-price">' . number_format($product['price'], 0) . ' ج.م</div>';
        echo '</div>';
    }
    if ($current_brand != '') echo '</div></div>';
    ?>
</body>
</html>
