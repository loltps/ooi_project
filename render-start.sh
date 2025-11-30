#!/bin/bash

# Ensure permissions are correct
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public/dist /var/www/public/build 2>/dev/null || true
chmod -R 775 /var/www/storage /var/www/bootstrap/cache 2>/dev/null || true
chmod -R 755 /var/www/public/dist /var/www/public/build 2>/dev/null || true

# Ensure manifest exists in both locations
if [ -f /var/www/public/dist/manifest.json ] && [ ! -f /var/www/public/build/manifest.json ]; then
    cp /var/www/public/dist/manifest.json /var/www/public/build/manifest.json
fi

# Remove hot file if it exists
rm -f /var/www/public/hot

# Run Laravel optimizations (only if .env exists and APP_KEY is set)
if [ -f /var/www/.env ] && grep -q "APP_KEY=base64:" /var/www/.env; then
    php artisan config:clear || true
    php artisan route:clear || true
    php artisan view:clear || true
    # php artisan config:cache || true   # re-enable only after debugging
fi

# ensure log exists and stream it so Render shows Laravel errors
touch /var/www/storage/logs/laravel.log
chown www-data:www-data /var/www/storage/logs/laravel.log || true
# stream logs in background (Render will capture this stdout)
tail -n +1 -F /var/www/storage/logs/laravel.log &

# debug info (optional but useful)
php -v || true
ls -la /var/www/vendor || true


# Run migrations (optional - uncomment if you have a database)
# php artisan migrate --force

# Start Apache
exec apache2-foreground