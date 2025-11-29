# Stage 1: Build Vite
FROM node:22 AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: Clean Laravel + Nginx + PHP-FPM
FROM richarvey/nginx-php-fpm:3.1.4

# Remove ALL default junk that ships with the image
RUN rm -rf /var/www/html/* \
    && rm -f /etc/nginx/sites-enabled/default \
    && rm -f /etc/nginx/conf.d/default.conf

# Copy your actual Laravel app
COPY . /var/www/html

# Copy built Vite assets
RUN mkdir -p /var/www/html/public/dist
COPY --from=frontend /app/public/dist/. /var/www/html/public/dist/

# Composer install
RUN cd /var/www/html && composer install --no-dev --optimize-autoloader --no-interaction

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Use Laravel-optimized Nginx config (this is the key!)
COPY nginx-laravel.conf /etc/nginx/sites-enabled/default

# Start
CMD ["/start.sh"]