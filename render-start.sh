#!/bin/sh
set -e

echo "Starting container. APP_ENV=${APP_ENV:-production}"
echo "UID=$(id -u) GID=$(id -g) USER=$(whoami)"

# Ensure permissions are correct (no fatal errors)
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public/dist /var/www/public/build 2>/dev/null || true
chmod -R 775 /var/www/storage /var/www/bootstrap/cache 2>/dev/null || true
chmod -R 755 /var/www/public/dist /var/www/public/build 2>/dev/null || true

# Ensure manifest exists in both locations (Laravel sometimes expects /public/build)
if [ -f /var/www/public/dist/manifest.json ] && [ ! -f /var/www/public/build/manifest.json ]; then
    cp /var/www/public/dist/manifest.json /var/www/public/build/manifest.json || true
fi

# Remove Vite hot file (ensures production assets used)
rm -f /var/www/public/hot || true

# Optional debug block: toggle by setting DEBUG_ASSETS=true in your Render service
if [ "${DEBUG_ASSETS:-false}" = "true" ]; then
  echo "---- DEBUG: listing public/dist ----"
  ls -la /var/www/public/dist || echo "public/dist missing"
  echo "---- DEBUG: listing public/dist/assets ----"
  ls -la /var/www/public/dist/assets || echo "public/dist/assets missing"
  echo "---- DEBUG: manifest.json ----"
  if [ -f /var/www/public/dist/manifest.json ]; then
    cat /var/www/public/dist/manifest.json || true
  else
    echo "manifest.json NOT FOUND"
  fi
  echo "---- DEBUG END ----"
fi

# Optional fallback: create a single predictable css file at public/css/app.css
# Toggle with CREATE_FALLBACK_CSS=true
if [ "${CREATE_FALLBACK_CSS:-false}" = "true" ]; then
  echo "Creating fallback public/css/app.css from dist assets..."
  mkdir -p /var/www/public/css || true
  # Concatenate any CSS files produced by Vite into a single app.css
  if ls /var/www/public/dist/assets/*.css 1> /dev/null 2>&1; then
    cat /var/www/public/dist/assets/*.css > /var/www/public/css/app.css || true
    chown www-data:www-data /var/www/public/css/app.css || true
    chmod 644 /var/www/public/css/app.css || true
    echo "Fallback CSS written to /var/www/public/css/app.css"
  else
    echo "No CSS files found to create fallback"
  fi
fi

# Run Laravel cache commands only if explicitly enabled.
# For debugging, do NOT enable (set ENABLE_CONFIG_CACHE=true only when you know assets are stable).
if [ "${ENABLE_CONFIG_CACHE:-false}" = "true" ] && [ -n "${APP_KEY:-}" ]; then
  echo "Running artisan config/route/view cache..."
  php /var/www/artisan config:cache || true
  php /var/www/artisan route:cache || true
  php /var/www/artisan view:cache || true
else
  echo "Skipping artisan config/route/view cache (ENABLE_CONFIG_CACHE=${ENABLE_CONFIG_CACHE:-false})"
fi

# Start Apache in the foreground
exec apache2-foreground
