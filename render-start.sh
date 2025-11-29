#!/bin/sh
set -e

echo "Starting container. APP_ENV=${APP_ENV:-production}"
echo "UID=$(id -u) GID=$(id -g) USER=$(whoami)"

# --- Debug: list built assets and manifest ---
echo "---- public/dist listing ----"
ls -la /var/www/public/dist || echo "public/dist missing"
echo "---- public/dist/assets listing ----"
ls -la /var/www/public/dist/assets || echo "public/dist/assets missing"

echo "---- manifest.json ----"
if [ -f /var/www/public/dist/manifest.json ]; then
  echo "manifest exists:"
  cat /var/www/public/dist/manifest.json || true
else
  echo "manifest.json NOT FOUND in /var/www/public/dist"
fi
echo "---- end manifest ----"

# Optionally dump first css file content (if exists)
first_css=$(ls /var/www/public/dist/assets/*.css 2>/dev/null | head -n1 || true)
if [ -n "$first_css" ]; then
  echo "---- first CSS file: $first_css (first 40 lines) ----"
  head -n 40 "$first_css" || true
  echo "---- end CSS preview ----"
else
  echo "No CSS files found in /var/www/public/dist/assets"
fi
# --- End debug ---

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
