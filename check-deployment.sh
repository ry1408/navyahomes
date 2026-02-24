#!/bin/bash

echo "🔍 NavyaHomes Deployment Verification"
echo "====================================="
echo ""

# Check Laravel
echo "✓ Checking Laravel..."
php artisan --version
echo ""

# Check Node/npm
echo "✓ Checking Node.js..."
node --version
npm --version
echo ""

# Check Composer
echo "✓ Checking Composer..."
composer --version
echo ""

# Check PHP
echo "✓ Checking PHP..."
php --version | head -1
echo ""

# Check key files
echo "✓ Checking key files..."
files=("composer.json" "package.json" "Procfile" "railway.json" "start.sh" ".env.example")
for file in "${files[@]}"; do
    if [ -f "$file" ]; then
        echo "  ✅ $file exists"
    else
        echo "  ❌ $file missing"
    fi
done
echo ""

# Check directories
echo "✓ Checking directories..."
dirs=("app" "config" "database" "public" "resources" "routes" "storage" "vendor")
for dir in "${dirs[@]}"; do
    if [ -d "$dir" ]; then
        echo "  ✅ $dir exists"
    else
        echo "  ❌ $dir missing"
    fi
done
echo ""

# Check git
echo "✓ Checking Git..."
git remote -v | grep origin
echo ""

echo "====================================="
echo "✅ Ready for Railway Deployment!"
echo "====================================="
