# دليل إعداد Git Deployment التلقائي

## نظرة عامة
هذا الدليل يشرح كيفية إعداد رفع تلقائي للكود من GitHub إلى الموقع مباشرة بدون استخدام File Manager.

---

## الخطوات المطلوبة

### 1️⃣ إعداد Git Repository في cPanel

1. افتح لوحة تحكم cPanel
2. ابحث عن **Git Version Control** أو **إصدار Git**
3. اضغط على **Create** لإنشاء repository جديد
4. املأ البيانات التالية:
   - **Clone URL**: `https://github.com/IbrahemAllithy/snus-egypt.git` (أو رابط الـ repo الخاص بك)
   - **Repository Path**: `/home/snusegypt/laravel-app`
   - **Repository Name**: اسم اختياري مثل `snus-egypt`
5. اضغط **Create**

---

### 2️⃣ إعداد Deployment Key (SSH)

بعد إنشاء الـ repository في cPanel:

1. cPanel هيعرضلك **Public Key**
2. انسخ الـ Public Key
3. روح على GitHub → Settings → Deploy Keys
4. اضغط **Add deploy key**
5. الصق الـ Public Key
6. فعّل **Allow write access** (اختياري)
7. احفظ

---

### 3️⃣ إعداد GitHub Webhook للتحديث التلقائي

1. في GitHub، افتح الـ repository
2. روح **Settings** → **Webhooks** → **Add webhook**
3. املأ البيانات:
   - **Payload URL**: `https://snusegypt.com:2083/cpsess{your-session}/execute/VersionControl/update?repository_root=/home/snusegypt/laravel-app`
     
     ⚠️ **ملاحظة**: هتلاقي الرابط الصحيح في cPanel Git → Manage → Deploy Settings
   
   - **Content type**: `application/json`
   - **Secret**: (اختياري)
   - **SSL verification**: Enable
   - **Events**: اختار **Just the push event**
4. احفظ الـ webhook

---

### 4️⃣ التأكد من ملف .cpanel.yml

الملف ده بيحدد إيه اللي هيحصل لما تعمل push:

```yaml
---
deployment:
  tasks:
    # Set deployment paths
    - export DEPLOYPATH=/home/snusegypt/laravel-app
    - export PUBLICPATH=/home/snusegypt/public_html

    # Copy application files
    - /bin/cp -R * $DEPLOYPATH

    # Copy public files
    - /bin/cp -R public/* $PUBLICPATH/

    # Navigate to Laravel directory
    - cd $DEPLOYPATH

    # Install/Update Composer dependencies
    - /usr/local/bin/ea-php82 /opt/cpanel/composer/bin/composer install --no-dev --optimize-autoloader --no-interaction

    # Clear and cache Laravel configurations
    - /usr/local/bin/ea-php82 artisan config:clear
    - /usr/local/bin/ea-php82 artisan cache:clear
    - /usr/local/bin/ea-php82 artisan route:clear
    - /usr/local/bin/ea-php82 artisan view:clear

    # Optimize Laravel
    - /usr/local/bin/ea-php82 artisan config:cache
    - /usr/local/bin/ea-php82 artisan route:cache
    - /usr/local/bin/ea-php82 artisan view:cache

    # Set correct permissions
    - chmod -R 755 $DEPLOYPATH/storage
    - chmod -R 755 $DEPLOYPATH/bootstrap/cache
```

الملف ده موجود بالفعل وتم تحديثه! ✅

---

### 5️⃣ إعداد ملف .env على السيرفر

⚠️ **مهم جداً**: الملف `.env` مش بيترفع على Git عشان أمان البيانات الحساسة.

لازم تعمل واحد من الاتنين:

#### الطريقة الأولى: رفع يدوي لـ .env (مرة واحدة فقط)
1. افتح File Manager في cPanel
2. روح `/home/snusegypt/laravel-app`
3. ارفع ملف `.env` بالإعدادات الصحيحة (database, APP_KEY, etc.)

#### الطريقة الثانية: نسخ من .env.example
```bash
cd /home/snusegypt/laravel-app
cp .env.example .env
php artisan key:generate
```
بعدين عدّل الملف بالإعدادات الصحيحة.

---

## 🚀 طريقة الاستخدام

بعد إعداد كل ده، الاستخدام بقى سهل جداً:

1. اعمل التعديلات في الكود على جهازك
2. commit التغييرات:
   ```bash
   git add .
   git commit -m "وصف التعديل"
   ```
3. ارفع على GitHub:
   ```bash
   git push origin main
   ```
4. **تلقائياً** الموقع هيستقبل التحديث وينفذ كل الأوامر في `.cpanel.yml` ✨

---

## 🔍 التحقق من نجاح الـ Deployment

### في cPanel:
1. افتح **Git Version Control**
2. اضغط **Manage** على الـ repository
3. شوف **Last Deployment** - لازم يكون نجح بدون أخطاء

### في GitHub:
1. روح **Settings** → **Webhooks**
2. اضغط على الـ webhook اللي عملته
3. شوف **Recent Deliveries** - لازم يكون Status Code `200`

---

## 🐛 حل المشاكل الشائعة

### المشكلة: Webhook بيرجع 403 أو 401
**الحل**: تأكد إن الـ Deploy Key متضاف في GitHub وإن الرابط صحيح.

### المشكلة: Composer بيفشل
**الحل**: تأكد إن المسار صحيح: `/usr/local/bin/ea-php82` أو غيّره حسب نسخة PHP اللي عندك.

### المشكلة: Permissions denied
**الحل**: خلّي المجلدات دي قابلة للكتابة:
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### المشكلة: الموقع بيعرض خطأ 500
**الحل**: 
1. تأكد إن `.env` موجود
2. شغّل `php artisan key:generate`
3. امسح الـ cache: `php artisan cache:clear`

---

## 📝 ملاحظات مهمة

1. **البيانات الحساسة**: ما ترفعش أبداً `.env` على Git
2. **Database Migrations**: لو عايز migrations تشتغل تلقائي، شيل الـ `#` من السطر ده في `.cpanel.yml`:
   ```yaml
   # - /usr/local/bin/ea-php82 artisan migrate --force
   ```
3. **نسخة PHP**: لو السيرفر بتاعك بيستخدم نسخة PHP مختلفة، غيّر `ea-php82` للنسخة الصحيحة
4. **Composer**: أول deployment ممكن ياخد وقت عشان بيحمّل dependencies

---

## ✅ الخلاصة

دلوقتي كل ما تعمل `git push`، الموقع هيتحدّث تلقائياً! 🎉

لو عندك أي مشكلة، شوف deployment logs في cPanel Git Management.
