# إصلاح مشكلة Deployment

## المشكلة
- الموقع كان يعمل في البداية لكن التحديثات لم تكن تظهر
- ثم أصبح الموقع لا يظهر نهائياً

## السبب
1. ملف `.cpanel.yml` كان يحتوي على مسارات خاطئة
2. كان ينسخ من `/home/snusegypt/laravel-app/public_html` (غير موجود)
3. Laravel موجود فعلياً في مجلد `public_html/` داخل الريبو
4. كان يوجد ملف `.cpanel.yml` قديم داخل `public_html/` لمشروع آخر

## الإصلاح ✅

### 1. تم تحديث `.cpanel.yml` الرئيسي
الآن الملف يقوم بـ:
- نسخ كل ملفات Laravel من `public_html/` إلى `/home/snusegypt/laravel-app/`
- نسخ ملفات public إلى subdomain `/home/snusegypt/public_html/tester/`
- تشغيل composer install
- مسح وإعادة بناء Laravel caches
- ضبط الصلاحيات

### 2. تم حذف `.cpanel.yml` القديم
تم حذف الملف القديم من داخل `public_html/` الذي كان لمشروع آخر

## الخطوات التالية

### على cPanel:
1. افتح **Git Version Control** في cPanel
2. اضغط **Manage** على repository الخاص بالمشروع
3. اضغط **Pull or Deploy** → **Update from Remote**
4. تابع deployment logs للتأكد من نجاح العملية

### إذا لم يعمل:
افحص الآتي:
1. تأكد أن `.env` موجود في `/home/snusegypt/laravel-app/`
2. تأكد من صلاحيات المجلدات:
   ```bash
   chmod -R 755 storage
   chmod -R 755 bootstrap/cache
   ```
3. شغل الأوامر يدوياً:
   ```bash
   cd /home/snusegypt/laravel-app
   php artisan config:clear
   php artisan cache:clear
   php artisan config:cache
   ```

## للتحديثات المستقبلية
الآن كل ما تعمل:
```bash
git add .
git commit -m "وصف التعديل"
git push origin main
```

سيتم تحديث الموقع تلقائياً! 🎉

## ملاحظة مهمة
تأكد أن ملف `.env` موجود على السيرفر في المسار:
```
/home/snusegypt/laravel-app/.env
```

إذا لم يكن موجوداً، ارفعه يدوياً عبر File Manager (مرة واحدة فقط).
