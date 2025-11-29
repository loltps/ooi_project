#!/bin/sh
set -e

# If you want verbose logs in container stdout (helpful for troubleshooting)
echo "Starting container. APP_ENV=${APP_ENV:-production}"

# Ensure storage and cache dirs exist and are writable
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public || true
chmod -R 775 /var/www/storage /var/www/bootstrap/cache || true

# Run Laravel optimizations only in non-local env (avoid on local dev)
if [ "${APP_ENV:-production}" != "local" ]; then
  echo "Caching config, routes and views..."
  php /var/www/artisan config:cache || true
  php /var/www/artisan route:cache || true
  php /var/www/artisan view:cache || true
fi

# Optional: run migrations if env var is set (use with caution)
if [ "${RUN_MIGRATIONS}" = "true" ]; then
  echo "Running migrations..."
  php /var/www/artisan migrate --force || true
fi

# Exec Apache in foreground (PID 1)
exec apache2-foreground