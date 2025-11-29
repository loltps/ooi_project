# Stage 1: Build Vite assets — this one is 100% guaranteed to work
FROM node:22 AS frontend   
WORKDIR /app

# Install dependencies
COPY package*.json ./
RUN npm ci                    

# Copy code and build
COPY . .
RUN npm run build             

# Stage 2: Laravel + Nginx + PHP-FPM (battle-tested image)
FROM richarvey/nginx-php-fpm:3.1.4

# Copy Laravel code
COPY . /var/www/html

# Copy built assets (safe)
RUN rm -rf /var/www/html/public/dist && mkdir -p /var/www/html/public/dist
COPY --from=frontend /app/public/dist/. /var/www/html/public/dist/

# Composer install
RUN cd /var/www/html && composer install --no-dev --optimize-autoloader --no-interaction

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# This image automatically listens on $PORT (Render's port)
CMD ["/start.sh"]