# 🧪 دليل إعداد نسخة Tester من Admin Panel

## 📋 نظرة عامة

هذا الدليل يوضح كيفية إنشاء نسخة **منفصلة تماماً** من الأدمن بانل للـ testers بنفس بيانات الـ production.

---

## 🎯 الهدف

- ✅ Database منفصل تماماً عن الـ production
- ✅ نفس البيانات (نسخة من الـ production)
- ✅ الـ testers يقدروا يعدلوا/يمسحوا بدون ما يأثروا على الموقع الحقيقي
- ✅ سهولة التحديث من الـ production لما تحتاج

---

## 📂 الملفات المُعدَّلة والمُنشأة

```
/
├── setup-tester-db.sh                    # ✅ سكريبت إنشاء ونسخ الـ database
├── public_html/
│   ├── .env.tester                       # ✅ إعدادات بيئة الـ tester
│   ├── .htaccess.tester                  # ✅ htaccess للـ subdomain
│   ├── public/index.php                  # ✅ معدّل للتعرف على الـ subdomain
│   └── bootstrap/app.php                 # ✅ معدّل لتحميل .env.tester
```

---

## 🚀 خطوات التنفيذ الكاملة

### **الخطوة 1: إنشاء Database للـ Tester** 📦

```bash
cd "/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8"

# تشغيل السكريبت (هيطلب منك password الـ root)
chmod +x setup-tester-db.sh
./setup-tester-db.sh
```

**ملاحظة:** السكريبت هيعمل:
1. ✅ Create database: `osu5223_snusegypt_tester`
2. ✅ Create user: `osu5223_tester` مع password: `tester_secure_pass_2026`
3. ✅ نسخ كل بيانات الـ production
4. ✅ Grant permissions

**⚠️ بديل يدوي (إذا كنت على cPanel):**

```sql
-- 1. اعمل database جديد من phpMyAdmin
CREATE DATABASE osu5223_snusegypt_tester;

-- 2. اعمل Export للـ production database
-- من phpMyAdmin → Export → Quick

-- 3. اعمل Import للـ tester database
-- من phpMyAdmin → Import
```

---

### **الخطوة 2: رفع الملفات على السيرفر** 📤

#### 2.1 رفع ملف .env.tester

```bash
# عن طريق FTP/SFTP أو cPanel File Manager
# ارفع الملف: public_html/.env.tester
```

أو يدوياً على cPanel:
1. روح على **File Manager**
2. روح للمجلد `public_html`
3. اعمل **New File** اسمه `.env.tester`
4. انسخ المحتوى من الملف المُنشأ

---

### **الخطوة 3: إعداد Subdomain** 🌐

#### 3.1 إنشاء Subdomain على cPanel

1. ادخل على **cPanel** → **Subdomains**
2. أضف subdomain جديد:
   ```
   Subdomain: tester
   Domain: snusegypt.com
   Document Root: /public_html/public
   ```
3. اضغط **Create**

#### 3.2 التأكد من الـ DNS

الـ subdomain `tester.snusegypt.com` هيتعمل له DNS record تلقائي:
```
Type: A Record
Host: tester
Points to: نفس IP الموقع الأساسي
```

---

### **الخطوة 4: تحديث الملفات على السيرفر** 🔧

#### 4.1 تحديث `public/index.php`

ارفع النسخة المُعدلة من:
```
public_html/public/index.php
```

أو عدّل يدوياً وأضف الكود ده في أول الملف بعد `define('LARAVEL_START', ...)`:

```php
// Determine which .env file to use based on subdomain
$envFile = '.env';

if (isset($_SERVER['HTTP_HOST'])) {
    $host = $_SERVER['HTTP_HOST'];
    if (strpos($host, 'tester.') === 0) {
        $envFile = '.env.tester';
    }
}

putenv("ENV_FILE={$envFile}");
$_ENV['ENV_FILE'] = $envFile;
$_SERVER['ENV_FILE'] = $envFile;
```

#### 4.2 تحديث `bootstrap/app.php`

ارفع النسخة المُعدلة أو أضف الأسطر دي بعد الـ `use` statements:

```php
// Load environment file
$envFile = $_ENV['ENV_FILE'] ?? $_SERVER['ENV_FILE'] ?? '.env';

return Application::configure(basePath: dirname(__DIR__))
    ->useEnvironmentPath(dirname(__DIR__))
    ->loadEnvironmentFrom($envFile)
    ->withRouting(
        // ... باقي الكود
```

---

### **الخطوة 5: Clear Cache** 🧹

على السيرفر، شغل:

```bash
cd public_html

# Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# أو استخدم الـ route الموجود
# اروح على: https://snusegypt.com/clear
```

---

### **الخطوة 6: اختبار النسخة** ✅

#### 6.1 افتح الـ Tester Admin

```
https://tester.snusegypt.com/admin
```

#### 6.2 سجل دخول بنفس حساب الـ Admin

استخدم نفس بيانات الدخول للـ production (لأن احنا نسخنا الـ database)

#### 6.3 تأكد إن الـ Database منفصل

جرب تعدل أي حاجة على `tester.snusegypt.com` وروح شوف `snusegypt.com` - المفروض ما يتأثرش!

---

## 🔄 تحديث بيانات الـ Tester من Production

لما تحتاج تحدث بيانات الـ tester عشان تبقى زي الـ production:

```bash
# على السيرفر
cd /home/osu5223/public_html

# Backup الـ tester الحالي (احتياطي)
mysqldump -u osu5223_tester -p osu5223_snusegypt_tester > tester_backup_$(date +%Y%m%d).sql

# نسخ من production
mysqldump -u osu5223_snusegyptcom -p osu5223_snusegyptcom | mysql -u osu5223_tester -p osu5223_snusegypt_tester
```

أو من cPanel:
1. Export الـ production database
2. Import فوق الـ tester database

---

## 🛡️ Security Notes

1. **الـ .env.tester** فيه `APP_ENV=staging` عشان تعرف إنك مش على production
2. **APP_DEBUG=true** عشان تشوف الأخطاء بوضوح
3. **MAIL_DRIVER=test** عشان الـ emails ما تتبعتش فعلياً من الـ tester
4. غيّر الـ `DB_PASSWORD` في production لحاجة قوية

---

## 📊 الفرق بين Production و Tester

| Feature | Production | Tester |
|---------|-----------|--------|
| **Domain** | snusegypt.com | tester.snusegypt.com |
| **Database** | osu5223_snusegyptcom | osu5223_snusegypt_tester |
| **APP_ENV** | production | staging |
| **APP_DEBUG** | false | true |
| **Mail** | يبعت فعلياً | test mode |
| **Data** | بيانات حقيقية | نسخة للاختبار |

---

## 🐛 Troubleshooting

### مشكلة: الـ Subdomain مش شغال

```bash
# تأكد إن الـ subdomain مُنشأ صح
ping tester.snusegypt.com

# لو مش شغال، استنى شوية (DNS propagation بياخد لحد 24 ساعة)
```

### مشكلة: لسه بيستخدم نفس الـ database

```bash
# تأكد إن الملفات اتعدلت صح
# اعمل test بسيط:

# أضف في public/index.php قبل أي حاجة:
echo "Using ENV: " . $envFile; exit;

# ثم افتح tester.snusegypt.com
# المفروض يطبع: "Using ENV: .env.tester"
```

### مشكلة: 500 Internal Server Error

```bash
# تأكد من الـ permissions
chmod 644 public_html/.env.tester
chmod 644 public_html/public/index.php

# شوف الـ error logs
tail -f /home/osu5223/logs/error_log
```

---

## ✨ الخلاصة

دلوقتي عندك:
- ✅ `snusegypt.com/admin` → Production (database حقيقي)
- ✅ `tester.snusegypt.com/admin` → Testing (database منفصل)

الـ testers يقدروا يشتغلوا براحتهم على `tester.snusegypt.com` بدون أي خوف! 🎉
