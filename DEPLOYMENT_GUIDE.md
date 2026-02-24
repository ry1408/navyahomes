# 🚀 Navya Homes Website - Deployment Guide

## Website Live Karne Ka Complete Process

### **Step 1: Hosting & Domain Purchase** 

#### **Recommended Hosting (Laravel Support Chahiye)**

**Best for Beginners:**
- **Hostinger** - ₹59/month se (Recommended) ⭐
  - Website: hostinger.in
  - Features: cPanel, Laravel support, Free SSL
  - Storage: 50GB-100GB
  
- **Bluehost** - ₹199/month
  - Website: bluehost.in
  - Features: WordPress + Laravel support
  
**For Advanced Users (VPS):**
- **DigitalOcean** - $4/month (₹330)
- **Linode** - $5/month (₹400)
- **Vultr** - $2.50/month (₹200)

#### **Domain Purchase**
- GoDaddy.com - ₹99/year (.in domain)
- Namecheap.com - ₹199/year
- Hostinger.in - ₹99/year

**Example Domains:**
- navyahomes.in
- navyahomesindia.com
- navyahomeslucknow.in

---

### **Step 2: Server Requirements**

Your Laravel app needs:
- ✅ PHP 8.1 or higher
- ✅ MySQL 5.7+
- ✅ Composer
- ✅ Node.js & NPM (for assets)
- ✅ Apache/Nginx web server
- ✅ SSL Certificate (Free - Let's Encrypt)

---

### **Step 3: Pre-Deployment Checklist**

Before uploading, complete these steps on local:

#### **A. Build Production Assets**
```bash
npm run build
```

#### **B. Optimize Laravel**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### **C. Database Export**
Export your database from phpMyAdmin:
1. Open http://localhost/phpmyadmin
2. Select `navyahomes` database
3. Click "Export" → "Go"
4. Save the SQL file

---

### **Step 4: Upload Files to Server**

#### **Via cPanel (Shared Hosting):**

1. **Login to cPanel** → File Manager
2. **Navigate to** `public_html` folder
3. **Upload these files/folders:**
   ```
   app/
   bootstrap/
   config/
   database/
   lang/
   public/       ← IMPORTANT: Files inside public/ go to public_html/
   resources/
   routes/
   storage/
   vendor/
   .env          ← Create fresh (don't copy local)
   artisan
   composer.json
   composer.lock
   package.json
   ```

4. **Important: Public folder setup**
   - Files INSIDE `public/` should be in root `public_html/`
   - Other Laravel folders should be OUTSIDE public_html (in parent directory)
   - Or keep everything in `public_html/laravel/` and point domain to `public/`

#### **Via FTP (FileZilla):**
1. Download FileZilla
2. Connect using credentials from hosting provider
3. Upload all files

---

### **Step 5: Server Configuration**

#### **A. Create .env file on server**
Use the `.env.production` file as template:
- Change APP_ENV to `production`
- Set APP_DEBUG to `false`
- Update database credentials
- Set your domain in APP_URL

#### **B. Set Folder Permissions**
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

#### **C. Create Database**
Via cPanel → MySQL Databases:
1. Create new database (e.g., `navyahom_db`)
2. Create database user
3. Add user to database (All Privileges)
4. Import your SQL file

#### **D. Install Composer Dependencies**
```bash
composer install --optimize-autoloader --no-dev
```

#### **E. Generate App Key**
```bash
php artisan key:generate
```

#### **F. Run Migrations**
```bash
php artisan migrate --force
```

---

### **Step 6: Domain Configuration**

#### **Point Domain to Server:**
1. Login to domain registrar (GoDaddy/Namecheap)
2. Update Nameservers to hosting nameservers
3. Or set A Record to server IP address

#### **SSL Certificate (HTTPS):**
In cPanel:
1. Go to SSL/TLS Status
2. Select domain → Run AutoSSL
3. Free SSL will be installed automatically

---

### **Step 7: Final Testing**

✅ Check these URLs:
- `https://yourdomain.com` - Home page
- `https://yourdomain.com/projects` - Projects listing
- `https://yourdomain.com/plots` - Plots listing
- `https://yourdomain.com/about` - About page
- `https://yourdomain.com/contact` - Contact form
- `https://yourdomain.com/admin/login` - Admin panel

✅ Test functionality:
- Contact form submission
- Image loading
- Admin login
- Lead management

---

## **Quick Reference Commands**

### **On Local (Before Upload):**
```bash
# Build assets
npm run build

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### **On Server (After Upload):**
```bash
# Install dependencies
composer install --optimize-autoloader --no-dev

# Set permissions
chmod -R 755 storage bootstrap/cache

# Generate key
php artisan key:generate

# Run migrations
php artisan migrate --force

# Cache everything
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## **Troubleshooting**

### **500 Error:**
- Check storage/ and bootstrap/cache/ permissions
- Verify .env database credentials
- Check error logs in storage/logs/

### **404 on all pages except home:**
- Enable mod_rewrite in Apache
- Check .htaccess file exists in public/

### **Images not loading:**
- Run: `php artisan storage:link`
- Check public/storage symlink

### **Permission Denied:**
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## **Support & Help**

### **Need Help?**
For hosting setup help:
- Hostinger Support: 24/7 live chat
- Contact: support@hostinger.com

For technical issues:
- Check Laravel docs: laravel.com/docs
- Check hosting documentation

---

## **Estimated Costs**

- **Domain:** ₹99-499/year
- **Hosting:** ₹59-399/month
- **SSL:** Free (Let's Encrypt)
- **Email:** Included with hosting

**Total First Year:** ~₹1,200 - ₹5,000

---

## **Next Steps**

1. ✅ Purchase hosting (Hostinger recommended)
2. ✅ Buy domain name
3. ✅ Follow Steps 2-7 above
4. ✅ Test website thoroughly
5. ✅ Launch! 🚀

**Tip:** Take backup before deployment using this command:
```bash
# Create backup
php artisan backup:run   # (if backup package installed)

# Or manual backup
# 1. Export database from phpMyAdmin
# 2. Copy entire project folder
```

---

**Your website is production-ready! Just need hosting & domain now.** 🎉
