#!/bin/bash

# Install composer dependencies
composer install --optimize-autoloader --no-dev

# Run migrations
php artisan migrate --force

# Clear and cache configs
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start the application
vendor/bin/heroku-php-apache2 public/
