# Stage 1 - Build Frontend (Vite)
FROM node:22 AS frontend
WORKDIR /app
COPY package*.json ./
# Use npm ci when lockfile present (faster, deterministic)
RUN if [ -f package-lock.json ]; then npm ci; else npm install; fi
COPY . .
RUN npm run build && \
    if [ -f public/build/.vite/manifest.json ]; then \
        cp public/build/.vite/manifest.json public/build/manifest.json; \
    fi

# Stage 2 - Backend (Laravel + PHP + Composer)
FROM php:8.1-apache AS backend

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    git curl unzip libpq-dev libonig-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Copy composer binary from official composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy app files
COPY . .

# Copy built frontend assets into container
COPY --from=frontend /app/public/build ./public/build

# Ensure manifest is in the right place and remove hot file
RUN rm -f public/hot

# Install PHP deps (prefer-dist, no-dev)
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Ensure vendor exists and owned by www-data
RUN chown -R www-data:www-data /var/www/vendor || true \
 && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public || true \
 && chmod -R 775 /var/www/storage /var/www/bootstrap/cache || true


# Apache vhost
RUN printf '%s\n' '<VirtualHost *:80>' \
    '    DocumentRoot /var/www/public' \
    '    <Directory /var/www/public>' \
    '        AllowOverride All' \
    '        Require all granted' \
    '        Options -Indexes +FollowSymLinks' \
    '    </Directory>' \
    '    <Directory /var/www/public/dist>' \
    '        Options -Indexes' \
    '        Require all granted' \
    '    </Directory>' \
    '    <Directory /var/www/public/build>' \
    '        Options -Indexes' \
    '        Require all granted' \
    '    </Directory>' \
    '</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Add startup script
COPY render-start.sh /usr/local/bin/render-start.sh
RUN chmod +x /usr/local/bin/render-start.sh

EXPOSE 80

CMD ["/usr/local/bin/render-start.sh"]
