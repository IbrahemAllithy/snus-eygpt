# 📤 دليل رفع الملفات خطوة بخطوة

## 📍 الملفات موجودة فين على جهازك؟

```
/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/
```

---

## 📋 الملفات المطلوب رفعها (4 ملفات فقط):

### ✅ **1. الملف: `.env.tester`**
- **موجود في:** `/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/.env.tester`
- **ارفعه على:** `/home/osu5223/public_html/.env.tester`

### ✅ **2. الملف: `public/index.php`**
- **موجود في:** `/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/public/index.php`
- **ارفعه على:** `/home/osu5223/public_html/public/index.php`

### ✅ **3. الملف: `bootstrap/app.php`**
- **موجود في:** `/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/bootstrap/app.php`
- **ارفعه على:** `/home/osu5223/public_html/bootstrap/app.php`

### ✅ **4. الملف: `routes/web.php`**
- **موجود في:** `/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/routes/web.php`
- **ارفعه على:** `/home/osu5223/public_html/routes/web.php`

### 🔧 **5. الملف: `public/diagnostic.php` (اختياري)**
- **موجود في:** `/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/public/diagnostic.php`
- **ارفعه على:** `/home/osu5223/public_html/public/diagnostic.php`

---

## 🚀 طريقة الرفع (3 طرق):

---

## **الطريقة 1️⃣: cPanel File Manager (الأسهل)** ⭐

### **خطوة بخطوة:**

#### **للملف `.env.tester`:**

1. افتح **cPanel** → **File Manager**
2. روح للمجلد `public_html`
3. اضغط **Upload** (زرار أزرق فوق)
4. اختار الملف `.env.tester` من جهازك:
   ```
   /Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/.env.tester
   ```
5. استنى لحد ما الرفع يخلص ✅

#### **للملف `public/index.php`:**

1. في **File Manager**، روح للمجلد `public_html/public`
2. دور على ملف `index.php` الموجود
3. اضغط عليه كليك يمين → **Edit** أو **Code Editor**
4. امسح كل المحتوى القديم
5. افتح الملف الجديد من جهازك:
   ```
   /Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/public/index.php
   ```
6. انسخ كل محتواه (Cmd+A ثم Cmd+C)
7. ارجع للـ Editor في cPanel والصق (Cmd+V)
8. اضغط **Save Changes** ✅

#### **للملف `bootstrap/app.php`:**

1. في **File Manager**، روح للمجلد `public_html/bootstrap`
2. دور على ملف `app.php`
3. اضغط عليه كليك يمين → **Edit**
4. امسح المحتوى القديم
5. افتح الملف من جهازك وانسخ محتواه:
   ```
   /Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/bootstrap/app.php
   ```
6. الصق في الـ Editor
7. اضغط **Save Changes** ✅

#### **للملف `routes/web.php`:**

1. في **File Manager**، روح للمجلد `public_html/routes`
2. دور على ملف `web.php`
3. اضغط كليك يمين → **Edit**
4. امسح المحتوى القديم
5. افتح الملف من جهازك وانسخ:
   ```
   /Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/routes/web.php
   ```
6. الصق في الـ Editor
7. اضغط **Save Changes** ✅

#### **للملف `public/diagnostic.php`:**

1. في **File Manager**، روح للمجلد `public_html/public`
2. اضغط **Upload**
3. اختار الملف:
   ```
   /Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/public/diagnostic.php
   ```
4. استنى لحد ما الرفع يخلص ✅

---

## **الطريقة 2️⃣: FileZilla (FTP Client)**

### **الإعدادات:**

1. حمّل **FileZilla** من: https://filezilla-project.org/
2. افتح FileZilla
3. اكتب في الأعلى:
   ```
   Host: ftp.snusegypt.com
   Username: osu5223 (أو username الـ cPanel بتاعك)
   Password: (password الـ cPanel)
   Port: 21
   ```
4. اضغط **Quickconnect**

### **رفع الملفات:**

1. **في الجانب الأيسر (Local site):**
   - روح للمجلد:
   ```
   /Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/
   ```

2. **في الجانب الأيمن (Remote site):**
   - روح للمجلد:
   ```
   /home/osu5223/public_html/
   ```

3. **اسحب الملفات:**
   - اسحب `.env.tester` من اليسار لليمين
   - ادخل مجلد `public/` في اليمين، واسحب `index.php` و `diagnostic.php`
   - ادخل مجلد `bootstrap/` واسحب `app.php`
   - ادخل مجلد `routes/` واسحب `web.php`

4. لما يسألك **Overwrite؟** اضغط **Yes** ✅

---

## **الطريقة 3️⃣: Terminal (SFTP)** 💻

```bash
# الاتصال بالسيرفر
sftp osu5223@snusegypt.com

# بعد إدخال الـ password، ارفع الملفات:

# رفع .env.tester
cd /home/osu5223/public_html
put "/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/.env.tester"

# رفع index.php
cd public
put "/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/public/index.php"

# رفع diagnostic.php
put "/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/public/diagnostic.php"

# رفع app.php
cd ../bootstrap
put "/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/bootstrap/app.php"

# رفع web.php
cd ../routes
put "/Users/macbook/Desktop/snus egypt/.claude/worktrees/admin-panel-tester-integration-f899a8/public_html/routes/web.php"

# الخروج
exit
```

---

## ✅ بعد الرفع:

### **1. Clear Cache:**
افتح في البراوزر:
```
https://snusegypt.com/clear
```

### **2. اختبر:**

#### **الحل البديل (Path):**
```
https://snusegypt.com/tester-admin
```

#### **الـ Subdomain:**
```
https://tester.snusegypt.com/admin
```

#### **الملف التشخيصي:**
```
https://snusegypt.com/diagnostic.php
أو
https://tester.snusegypt.com/diagnostic.php
```

---

## 🎯 ملخص سريع:

| الملف | من | إلى |
|-------|-----|-----|
| `.env.tester` | `...worktrees/.../public_html/` | `/public_html/` |
| `index.php` | `...worktrees/.../public_html/public/` | `/public_html/public/` |
| `app.php` | `...worktrees/.../public_html/bootstrap/` | `/public_html/bootstrap/` |
| `web.php` | `...worktrees/.../public_html/routes/` | `/public_html/routes/` |
| `diagnostic.php` | `...worktrees/.../public_html/public/` | `/public_html/public/` |

---

## 💡 نصيحة:

**استخدم الطريقة 1 (cPanel File Manager)** - هي الأسهل ومش محتاجة برامج إضافية! 🎉
