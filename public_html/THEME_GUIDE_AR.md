# 🎨 نظام الثيمات الحديث - دليل الاستخدام الكامل

## 📋 المحتويات
1. [كيفية استخدام نظام الألوان](#color-system)
2. [كيفية تطبيق Dark Mode](#dark-mode)
3. [كيفية إضافة ثيمات جديدة](#new-themes)
4. [أمثلة عملية](#examples)

---

## 🎨 <a name="color-system"></a>نظام الألوان (CSS Variables)

### الألوان الأساسية المتاحة:

```css
--color-primary: #ae69f5;      /* اللون الأساسي (بنفسجي) */
--color-secondary: #f49d2a;    /* اللون الثانوي (برتقالي) */
--bg-page: #f8f9fa;            /* خلفية الصفحة */
--bg-panel: white;             /* خلفية الكروت */
--bg-body: white;              /* خلفية الـ body */
--text-body: #1a3353;          /* لون النص الأساسي */
--text-muted: #6c757d;         /* لون النص الثانوي */
--border-color: #e9ecef;       /* لون الحدود */
--shadow-lg: 0 8px 24px rgba(0,0,0,0.15);
--radius-lg: 12px;             /* تقويس الحواف */
--transition-base: 300ms cubic-bezier(0.4, 0, 0.2, 1);
```

### كيفية استخدام الألوان في CSS/SCSS:

```css
/* في أي مكان في CSS */
.my-button {
    background: var(--color-primary);
    color: white;
    border-radius: var(--radius-lg);
    transition: all var(--transition-base);
}

.my-card {
    background: var(--bg-panel);
    box-shadow: var(--shadow-lg);
}
```

### كيفية استخدام الألوان في HTML Inline:

```html
<div style="background: var(--color-primary); color: white;">
    محتوى بخلفية بنفسجية
</div>

<button style="background: var(--color-secondary); border-radius: var(--radius-lg);">
    زر برتقالي
</button>
```

---

## 🌓 <a name="dark-mode"></a>Dark Mode (الوضع الليلي)

### كيف يعمل؟
عندما تضيف class `dark` على الـ `body`، تتغير جميع الألوان تلقائياً:

```css
body.dark {
    --bg-page: #1b1026;         /* خلفية داكنة */
    --bg-panel: #2a1f3d;        /* كروت داكنة */
    --bg-body: #0f0a1a;         /* body داكن */
    --text-body: #BDD1F8;       /* نص فاتح */
    --text-muted: #8b9dc3;      /* نص ثانوي فاتح */
    --border-color: #3d2f5a;    /* حدود داكنة */
}
```

### زر التبديل الموجود:
- الزر موجود في أسفل يمين الصفحة (أيقونة القمر 🌙)
- يحفظ التفضيل في localStorage
- يعمل على جميع الصفحات

### تفعيل/إلغاء Dark Mode برمجياً:

```javascript
// تفعيل Dark Mode
document.body.classList.add('dark');
localStorage.setItem('theme', 'dark');

// إلغاء Dark Mode
document.body.classList.remove('dark');
localStorage.setItem('theme', 'light');

// التبديل
document.body.classList.toggle('dark');
```

---

## 🎨 <a name="new-themes"></a>إضافة ثيمات لونية جديدة

### الثيمات المتوفرة:

1. **Default** (البنفسجي) - `data-theme="default"`
2. **Red** (الأحمر) - `data-theme="red"`
3. **Green** (الأخضر) - `data-theme="green"`
4. **Blue** (الأزرق) - `data-theme="blue"`
5. **Orange** (البرتقالي) - `data-theme="orange"`

### كيفية تطبيق ثيم:

#### 1. من HTML:
```html
<html data-theme="red">
    <!-- الصفحة ستكون بالثيم الأحمر -->
</html>
```

#### 2. من JavaScript:
```javascript
// تطبيق ثيم أحمر
document.documentElement.setAttribute('data-theme', 'red');
localStorage.setItem('colorTheme', 'red');

// تطبيق ثيم أخضر
document.documentElement.setAttribute('data-theme', 'green');
localStorage.setItem('colorTheme', 'green');

// العودة للثيم الافتراضي
document.documentElement.setAttribute('data-theme', 'default');
localStorage.removeItem('colorTheme');
```

#### 3. إنشاء أزرار للتبديل:
```html
<div class="theme-switcher">
    <button onclick="switchTheme('red')" 
            style="background: #ff0000; width: 40px; height: 40px; border-radius: 50%;">
    </button>
    
    <button onclick="switchTheme('green')" 
            style="background: #00a859; width: 40px; height: 40px; border-radius: 50%;">
    </button>
    
    <button onclick="switchTheme('blue')" 
            style="background: #2196F3; width: 40px; height: 40px; border-radius: 50%;">
    </button>
</div>

<script>
function switchTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('colorTheme', theme);
}
</script>
```

### إضافة ثيم جديد:

افتح ملف: `resources/scss/modern/_variables-modern.scss`

أضف الثيم الجديد:

```scss
[data-theme="purple"] {
    --color-primary: #9b59b6;    /* بنفسجي غامق */
    --color-secondary: #e74c3c;  /* أحمر */
}

[data-theme="pink"] {
    --color-primary: #e91e63;    /* وردي */
    --color-secondary: #f06292;  /* وردي فاتح */
}

[data-theme="yellow"] {
    --color-primary: #ffc107;    /* أصفر */
    --color-secondary: #ff9800;  /* برتقالي */
}
```

ثم قم ببناء الأصول:
```bash
npm run build
```

---

## 💡 <a name="examples"></a>أمثلة عملية

### مثال 1: زر بالألوان الحديثة

```html
<button class="btn btn-primary rounded-pill px-4 py-2" 
        style="background: var(--color-primary); 
               border: none; 
               box-shadow: 0 4px 12px rgba(174,105,245,0.3);
               transition: all var(--transition-base);">
    <i class="fas fa-shopping-cart me-2"></i>
    أضف للسلة
</button>
```

### مثال 2: كارت منتج حديث

```html
<div class="product-card-modern" data-aos="fade-up">
    <div class="card border-0 h-100" 
         style="border-radius: var(--radius-lg); 
                box-shadow: 0 4px 12px rgba(0,0,0,0.08); 
                background: var(--bg-panel);">
        
        <img src="product.jpg" 
             class="card-img-top" 
             style="transition: transform 0.5s ease;">
        
        <div class="card-body p-4">
            <h5 style="color: var(--text-body);">اسم المنتج</h5>
            <p style="color: var(--text-muted);">وصف المنتج</p>
            <div class="price" style="color: var(--color-primary); font-weight: 700;">
                299 جنيه
            </div>
        </div>
    </div>
</div>

<style>
.product-card-modern:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.15) !important;
}
.product-card-modern:hover img {
    transform: scale(1.1);
}
</style>
```

### مثال 3: قسم بتدرج لوني

```html
<section class="py-5" 
         style="background: linear-gradient(135deg, 
                var(--color-primary) 0%, 
                var(--color-secondary) 100%);">
    <div class="container">
        <h2 class="text-white text-center mb-4">عنوان القسم</h2>
        <p class="text-white text-center">محتوى القسم</p>
    </div>
</section>
```

### مثال 4: Badge حديث

```html
<span class="badge rounded-pill px-3 py-2" 
      style="background: var(--color-primary); 
             color: white; 
             font-size: 14px;">
    خصم 20%
</span>

<span class="badge rounded-pill px-3 py-2" 
      style="background: var(--color-secondary); 
             color: white; 
             font-size: 14px;">
    جديد
</span>
```

### مثال 5: Input حديث

```html
<input type="text" 
       class="form-control" 
       placeholder="ابحث هنا..."
       style="border-radius: var(--radius-lg); 
              border: 2px solid var(--border-color); 
              padding: 12px 20px;
              transition: all var(--transition-base);">

<style>
input:focus {
    border-color: var(--color-primary) !important;
    box-shadow: 0 0 0 3px rgba(174,105,245,0.1) !important;
}
</style>
```

---

## 🎯 نصائح مهمة

### ✅ افعل:
- استخدم CSS Variables دائماً بدلاً من الألوان المباشرة
- اختبر التصميم في Light Mode و Dark Mode
- استخدم `var(--transition-base)` للانتقالات السلسة
- استخدم `data-aos` للرسوم المتحركة

### ❌ لا تفعل:
- لا تستخدم ألوان مباشرة مثل `#ae69f5`
- لا تنسَ إضافة fallback للمتصفحات القديمة:
  ```css
  background: #ae69f5; /* fallback */
  background: var(--color-primary);
  ```

---

## 🔧 أدوات مساعدة

### كلاسات جاهزة:

```html
<!-- Hover Lift Effect -->
<div class="hover-lift">محتوى يرتفع عند التحويم</div>

<!-- Animated on Scroll -->
<div data-aos="fade-up">محتوى يظهر مع السكرول</div>
<div data-aos="fade-left">محتوى يظهر من اليسار</div>
<div data-aos="zoom-in">محتوى يتكبر</div>

<!-- Product Card Modern -->
<div class="product-card-modern">كارت منتج حديث</div>
```

### JavaScript Helpers:

```javascript
// تحديث رسوم AOS بعد إضافة محتوى جديد
window.refreshAOS();

// تحديث lazy loading للصور
window.productCardEnhanced.refreshLazyLoading();
```

---

## 📱 التوافق مع الأجهزة

النظام متوافق مع:
- ✅ Desktop (جميع الدقات)
- ✅ Tablet (768px+)
- ✅ Mobile (320px+)
- ✅ جميع المتصفحات الحديثة

---

## 🎉 الخلاصة

نظام الثيمات الحديث يتيح لك:
1. ✨ تغيير ألوان الموقع كله بتغيير attribute واحد
2. 🌓 Dark Mode جاهز وسهل الاستخدام
3. 🎨 إضافة ثيمات جديدة بسهولة
4. 📦 كل شيء في ملف واحد بدلاً من 25 ملف
5. ⚡ أداء أفضل وتحميل أسرع

**جرب الآن:** افتح `/demo-modern` وشاهد كل الإمكانيات! 🚀

---

Created: 2026-09-16
Version: 1.0
Status: Production Ready ✅
