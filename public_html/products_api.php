<?php
/**
 * Products API for Snus Egypt
 * Simple JSON API to fetch products
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$db = new PDO('sqlite:' . __DIR__ . '/database.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = $_GET['action'] ?? 'list';

try {
    switch ($action) {
        case 'list':
            // Get all products
            $brand_id = $_GET['brand_id'] ?? null;
            $query = "
                SELECT
                    p.id,
                    p.product_slug,
                    p.price,
                    pd.title,
                    pd.desc as description,
                    b.id as brand_id,
                    b.name as brand_name,
                    md_large.path as image_large,
                    md_medium.path as image_medium,
                    md_thumb.path as image_thumbnail
                FROM products p
                LEFT JOIN product_detail pd ON p.id = pd.product_id
                LEFT JOIN brands b ON p.brand_id = b.id
                LEFT JOIN media m ON p.media_id = m.id
                LEFT JOIN media_detail md_large ON m.id = md_large.media_id AND md_large.media_type = 'large'
                LEFT JOIN media_detail md_medium ON m.id = md_medium.media_id AND md_medium.media_type = 'medium'
                LEFT JOIN media_detail md_thumb ON m.id = md_thumb.media_id AND md_thumb.media_type = 'thumbnail'
            ";

            if ($brand_id) {
                $query .= " WHERE p.brand_id = :brand_id";
            }

            $query .= " ORDER BY b.name, pd.title";

            $stmt = $db->prepare($query);
            if ($brand_id) {
                $stmt->bindValue(':brand_id', $brand_id, PDO::PARAM_INT);
            }
            $stmt->execute();

            echo json_encode([
                'success' => true,
                'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            break;

        case 'brands':
            // Get all brands with product counts
            $query = "
                SELECT
                    b.id,
                    b.name,
                    b.slug,
                    COUNT(p.id) as product_count
                FROM brands b
                LEFT JOIN products p ON b.id = p.brand_id
                GROUP BY b.id
                ORDER BY COUNT(p.id) DESC
            ";

            echo json_encode([
                'success' => true,
                'data' => $db->query($query)->fetchAll(PDO::FETCH_ASSOC)
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            break;

        case 'product':
            // Get single product by ID or slug
            $id = $_GET['id'] ?? null;
            $slug = $_GET['slug'] ?? null;

            $query = "
                SELECT
                    p.*,
                    pd.title,
                    pd.desc as description,
                    b.name as brand_name,
                    b.slug as brand_slug,
                    md_large.path as image_large,
                    md_medium.path as image_medium,
                    md_thumb.path as image_thumbnail
                FROM products p
                LEFT JOIN product_detail pd ON p.id = pd.product_id
                LEFT JOIN brands b ON p.brand_id = b.id
                LEFT JOIN media m ON p.media_id = m.id
                LEFT JOIN media_detail md_large ON m.id = md_large.media_id AND md_large.media_type = 'large'
                LEFT JOIN media_detail md_medium ON m.id = md_medium.media_id AND md_medium.media_type = 'medium'
                LEFT JOIN media_detail md_thumb ON m.id = md_thumb.media_id AND md_thumb.media_type = 'thumbnail'
            ";

            if ($id) {
                $query .= " WHERE p.id = :id";
                $stmt = $db->prepare($query);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            } elseif ($slug) {
                $query .= " WHERE p.product_slug = :slug";
                $stmt = $db->prepare($query);
                $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
            } else {
                throw new Exception('Missing id or slug parameter');
            }

            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$product) {
                throw new Exception('Product not found');
            }

            echo json_encode([
                'success' => true,
                'data' => $product
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            break;

        case 'stats':
            // Get statistics
            $stats = [
                'total_products' => $db->query("SELECT COUNT(*) FROM products")->fetchColumn(),
                'total_brands' => $db->query("SELECT COUNT(*) FROM brands")->fetchColumn(),
                'brands' => $db->query("
                    SELECT
                        b.name,
                        COUNT(p.id) as count
                    FROM brands b
                    LEFT JOIN products p ON b.id = p.brand_id
                    GROUP BY b.id
                    ORDER BY COUNT(p.id) DESC
                ")->fetchAll(PDO::FETCH_ASSOC)
            ];

            echo json_encode([
                'success' => true,
                'data' => $stats
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            break;

        default:
            throw new Exception('Invalid action');
    }

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
