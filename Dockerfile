# Stage 1: Build Vite assets
FROM node:22-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci --omit=dev
COPY . .
RUN npm run build

# Stage 2: Production image with PHP + Nginx
FROM richarvey/nginx-php-fpm:3.1.4

# Copy your Laravel code
COPY . /var/www/html

# Copy built Vite assets (safe, never fails)
RUN rm -rf /var/www/html/public/dist && mkdir -p /var/www/html/public/dist
COPY --from=frontend /app/public/dist/. /var/www/html/public/dist/

# Composer install (already has composer inside the base image)
RUN cd /var/www/html && composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Use the default nginx config from the base image (already perfect for Laravel)
# No need to add nginx.conf — this base image already routes / → public/index.php

# Expose port (Render expects $PORT, this image auto-detects it)
EXPOSE $PORT

# Let the base image handle startup (nginx + php-fpm)
CMD ["/start.sh"]