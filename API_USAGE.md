# 🚀 Snus Egypt - دليل استخدام API المنتجات

## 📡 API Endpoints

### 1. عرض جميع المنتجات
```
GET /products_api.php?action=list
```

**مثال:**
```bash
curl "http://localhost/products_api.php?action=list"
```

**الاستجابة:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "product_slug": "velo-cool-peppermint",
      "price": 150,
      "title": "Velo Cool Peppermint",
      "description": "نكهة نعناع منعشة",
      "brand_id": 1,
      "brand_name": "Velo",
      "image_large": "assets/images/products/202608191942snusegy_velo_cool_peppermint.jpeg",
      "image_medium": "assets/images/products/medium202608191942snusegy_velo_cool_peppermint.jpeg",
      "image_thumbnail": "assets/images/products/thumbnail202608191942snusegy_velo_cool_peppermint.jpeg"
    }
  ]
}
```

---

### 2. عرض منتجات علامة تجارية معينة
```
GET /products_api.php?action=list&brand_id=1
```

**مثال:**
```bash
curl "http://localhost/products_api.php?action=list&brand_id=1"
```

---

### 3. عرض جميع العلامات التجارية
```
GET /products_api.php?action=brands
```

**مثال:**
```bash
curl "http://localhost/products_api.php?action=brands"
```

**الاستجابة:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Velo",
      "slug": "velo",
      "product_count": 16
    }
  ]
}
```

---

### 4. عرض منتج واحد بالـ ID
```
GET /products_api.php?action=product&id=1
```

**مثال:**
```bash
curl "http://localhost/products_api.php?action=product&id=1"
```

---

### 5. عرض منتج واحد بالـ Slug
```
GET /products_api.php?action=product&slug=velo-cool-peppermint
```

**مثال:**
```bash
curl "http://localhost/products_api.php?action=product&slug=velo-cool-peppermint"
```

---

### 6. عرض الإحصائيات
```
GET /products_api.php?action=stats
```

**مثال:**
```bash
curl "http://localhost/products_api.php?action=stats"
```

**الاستجابة:**
```json
{
  "success": true,
  "data": {
    "total_products": 90,
    "total_brands": 7,
    "brands": [
      {"name": "Pablo", "count": 29},
      {"name": "Iceberg", "count": 23},
      {"name": "Velo", "count": 16}
    ]
  }
}
```

---

## 💻 استخدام JavaScript (Fetch API)

### عرض جميع المنتجات
```javascript
fetch('/products_api.php?action=list')
  .then(response => response.json())
  .then(data => {
    console.log('المنتجات:', data.data);
    
    // عرض المنتجات في الصفحة
    const container = document.getElementById('products');
    data.data.forEach(product => {
      container.innerHTML += `
        <div class="product">
          <img src="${product.image_large}" alt="${product.title}">
          <h3>${product.title}</h3>
          <p>${product.brand_name}</p>
          <span>${product.price} ج.م</span>
        </div>
      `;
    });
  });
```

### عرض منتجات علامة تجارية
```javascript
async function loadBrandProducts(brandId) {
  const response = await fetch(`/products_api.php?action=list&brand_id=${brandId}`);
  const data = await response.json();
  return data.data;
}

// استخدام
loadBrandProducts(1).then(products => {
  console.log('منتجات Velo:', products);
});
```

### عرض منتج واحد
```javascript
async function getProduct(slug) {
  const response = await fetch(`/products_api.php?action=product&slug=${slug}`);
  const data = await response.json();
  return data.data;
}

// استخدام
getProduct('velo-cool-peppermint').then(product => {
  console.log('المنتج:', product);
});
```

---

## 🎨 مثال عملي - صفحة HTML كاملة

```html
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Snus Egypt - المنتجات</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #0A0D12;
            color: #fff;
            padding: 2rem;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .product {
            background: #0F131C;
            border-radius: 16px;
            padding: 1rem;
            transition: transform 0.2s;
        }
        .product:hover { transform: translateY(-4px); }
        .product img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            background: #161D2B;
            border-radius: 12px;
        }
        .product h3 {
            margin: 1rem 0 0.5rem;
            font-size: 1rem;
        }
        .product .price {
            color: #38BDF8;
            font-size: 1.2rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <h1>🇪🇬 Snus Egypt</h1>
    <div id="products" class="products-grid"></div>

    <script>
        // تحميل المنتجات
        fetch('/products_api.php?action=list')
            .then(res => res.json())
            .then(data => {
                const container = document.getElementById('products');
                data.data.forEach(p => {
                    container.innerHTML += `
                        <div class="product">
                            <img src="${p.image_large}" alt="${p.title}">
                            <h3>${p.title}</h3>
                            <p style="color: #666;">${p.brand_name}</p>
                            <div class="price">${p.price} ج.م</div>
                        </div>
                    `;
                });
            });
    </script>
</body>
</html>
```

---

## 🔧 استخدام PHP

### عرض المنتجات في صفحة PHP
```php
<?php
$db = new PDO('sqlite:database.sqlite');

// عرض كل المنتجات
$products = $db->query("
    SELECT p.*, pd.title, b.name as brand, md.path as image
    FROM products p
    LEFT JOIN product_detail pd ON p.id = pd.product_id
    LEFT JOIN brands b ON p.brand_id = b.id
    LEFT JOIN media m ON p.media_id = m.id
    LEFT JOIN media_detail md ON m.id = md.media_id AND md.media_type = 'large'
")->fetchAll(PDO::FETCH_ASSOC);

foreach ($products as $product): ?>
    <div class="product">
        <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>">
        <h3><?= $product['title'] ?></h3>
        <p><?= $product['brand'] ?></p>
        <span><?= $product['price'] ?> ج.م</span>
    </div>
<?php endforeach; ?>
```

---

## ✅ ملخص الملفات

| الملف | الوظيفة |
|------|---------|
| `products_api.php` | REST API للمنتجات |
| `test_products.php` | صفحة عرض تجريبية |
| `database.sqlite` | قاعدة البيانات |
| `assets/images/products/` | مجلد الصور |
| `PRODUCTS_REPORT.md` | تقرير شامل |

---

## 🎯 الخطوات التالية

1. ✅ دمج API في الموقع الفعلي
2. ✅ إضافة نظام البحث عن المنتجات
3. ✅ إضافة نظام الفلترة حسب العلامة التجارية
4. ✅ إضافة صفحة تفاصيل المنتج الفردي
5. ✅ إضافة نظام السلة (Cart)
6. ✅ تحسين الأداء (Caching)

---

تم بواسطة Claude Code 🚀
