# 🚀 دليل رفع الموقع على Subdomain جديد

## 📋 الخطوات الكاملة لرفع على sub.snusegypt.com

---

## الطريقة 1: عبر cPanel (الأسهل) ✅

### **الخطوة 1: إنشاء Subdomain**

1. **سجل دخول على cPanel**
   ```
   https://snusegypt.com/cpanel
   ```

2. **اذهب إلى Subdomains**
   - ابحث عن "Subdomains" في cPanel
   - أو اذهب مباشرة لـ: `Domains → Subdomains`

3. **أنشئ Subdomain جديد**
   - **Subdomain:** اكتب `sub`
   - **Domain:** اختر `snusegypt.com`
   - **Document Root:** سيصبح تلقائياً `public_html/sub`
   - أو غيره لـ: `public_html/sub.snusegypt.com`
   - اضغط **Create**

### **الخطوة 2: رفع الملفات**

#### **Option A: نسخ الملفات عبر File Manager**

1. **افتح File Manager في cPanel**

2. **اذهب للمجلد الجديد**
   ```
   public_html/sub/
   أو
   public_html/sub.snusegypt.com/
   ```

3. **انسخ كل الملفات من المشروع الحالي**
   - من: `public_html/`
   - إلى: `public_html/sub/`

#### **Option B: رفع عبر FTP**

1. **استخدم FileZilla أو أي FTP client**
   
2. **اتصل بالسيرفر:**
   ```
   Host: ftp.snusegypt.com
   Username: [your-cpanel-username]
   Password: [your-cpanel-password]
   Port: 21
   ```

3. **ارفع الملفات:**
   - ارفع محتويات `public_html/` 
   - إلى المجلد: `/public_html/sub/`

### **الخطوة 3: إعداد Laravel**

1. **افتح Terminal في cPanel** (أو SSH)

2. **اذهب لمجلد المشروع:**
   ```bash
   cd public_html/sub/
   ```

3. **انسخ ملف .env:**
   ```bash
   cp .env.example .env
   ```
   أو إذا كان موجود:
   ```bash
   # تأكد من تحديث .env بالبيانات الصحيحة
   nano .env
   ```

4. **حدّث .env:**
   ```env
   APP_URL=https://sub.snusegypt.com
   
   DB_HOST=localhost
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

5. **نفذ الأوامر:**
   ```bash
   # Generate application key
   php artisan key:generate
   
   # Clear caches
   php artisan config:clear
   php artisan cache:clear
   php artisan route:clear
   php artisan view:clear
   
   # Optimize
   php artisan config:cache
   php artisan route:cache
   ```

6. **اضبط الصلاحيات:**
   ```bash
   chmod -R 755 storage bootstrap/cache
   chown -R [your-user]:nobody storage bootstrap/cache
   ```

### **الخطوة 4: إعداد Database (إذا لزم)**

#### **Option A: استخدام نفس Database**
- ✅ استخدم نفس بيانات Database في `.env`
- الموقعين سيشاركان نفس البيانات

#### **Option B: إنشاء Database جديد**
1. **في cPanel → MySQL Databases**
2. **أنشئ Database جديد:**
   ```
   Database Name: cpanel_user_sub
   ```
3. **أنشئ User جديد:**
   ```
   Username: cpanel_user_sub
   Password: [strong-password]
   ```
4. **أضف User للـ Database** مع **All Privileges**
5. **حدّث .env** بالبيانات الجديدة
6. **نفذ Migration:**
   ```bash
   php artisan migrate --seed
   ```

---

## الطريقة 2: عبر SSH (للمتقدمين) 🔧

```bash
# 1. اتصل بالسيرفر
ssh your-user@snusegypt.com

# 2. اذهب لمجلد public_html
cd public_html

# 3. انسخ المشروع كله
cp -r . sub/

# 4. اذهب للمجلد الجديد
cd sub/

# 5. حدّث .env
nano .env
# غير APP_URL إلى https://sub.snusegypt.com

# 6. نفذ Laravel commands
php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan config:cache

# 7. اضبط الصلاحيات
chmod -R 755 storage bootstrap/cache
```

---

## ⚙️ إعدادات إضافية مهمة

### **1. تحديث .htaccess (إذا لزم)**

في `public_html/sub/.htaccess`:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    
    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    
    # Redirect to HTTPS
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
    
    # Laravel routes
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

### **2. تأكد من SSL Certificate**

في cPanel:
1. اذهب إلى **SSL/TLS Status**
2. تأكد أن `sub.snusegypt.com` عليه SSL
3. إذا لا، اضغط **Run AutoSSL**

### **3. تحديث Vite في .env**
```env
VITE_APP_URL=https://sub.snusegypt.com
```

ثم:
```bash
npm run build
```

---

## ✅ التحقق من النجاح

### **اختبار الموقع:**
1. افتح: `https://sub.snusegypt.com`
2. يجب أن يظهر الموقع بشكل صحيح
3. جرب Dark Mode (زر القمر)
4. جرب `/demo-modern`

### **اختبار Build Assets:**
```
https://sub.snusegypt.com/build/manifest.json
```
يجب أن يظهر ملف JSON

---

## 🐛 حل المشاكل الشائعة

### **المشكلة 1: Error 500**
```bash
# تحقق من logs
tail -f storage/logs/laravel.log

# امسح الكاش
php artisan cache:clear
php artisan config:clear
```

### **المشكلة 2: CSS/JS لا يعمل**
```bash
# أعد بناء Assets
npm run build

# تأكد من المسارات في .env
APP_URL=https://sub.snusegypt.com
```

### **المشكلة 3: Database Connection Error**
- تحقق من بيانات `.env`
- تأكد أن Database User له صلاحيات
- تأكد أن Database موجود

### **المشكلة 4: Subdomain لا يفتح**
- انتظر 5-10 دقائق (DNS propagation)
- امسح Cache المتصفح
- جرب في Incognito mode

---

## 🚀 الأوامر السريعة (نسخ/لصق)

```bash
# 1. انسخ المشروع
cd /home/[your-user]/public_html
cp -r . sub/

# 2. إعداد Laravel
cd sub/
cp .env.example .env
nano .env  # غير APP_URL

# 3. Laravel setup
php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan config:cache

# 4. الصلاحيات
chmod -R 755 storage bootstrap/cache

# 5. Build Assets (إذا لزم)
npm run build
```

---

## 📝 Checklist النهائي

- [ ] تم إنشاء Subdomain في cPanel
- [ ] تم نسخ/رفع الملفات
- [ ] تم تحديث `.env` بـ APP_URL الصحيح
- [ ] تم تشغيل `php artisan key:generate`
- [ ] تم مسح الكاش (`config:clear`, `cache:clear`)
- [ ] تم ضبط صلاحيات storage
- [ ] تم تحديث Database settings (إذا لزم)
- [ ] يوجد SSL على الـ subdomain
- [ ] تم اختبار الموقع: `https://sub.snusegypt.com`
- [ ] تعمل Assets (CSS/JS)
- [ ] يعمل Dark Mode
- [ ] تفتح صفحة `/demo-modern`

---

## 💡 نصيحة مهمة

**للتطوير والاختبار:**
استخدم subdomain للتجربة بدون التأثير على الموقع الأساسي!

**بعد التأكد من كل شيء:**
يمكنك نقل التحديثات للموقع الرئيسي `snusegypt.com`

---

**🎉 بالتوفيق! إذا واجهت أي مشكلة، أخبرني! 🚀**
