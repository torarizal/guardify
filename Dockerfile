# Menggunakan image resmi PHP 8.4 dengan Apache
FROM php:8.4-apache

# 1. Install dependensi sistem terlebih dahulu
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql zip

# 2. HAPUS PAKSA modul MPM yang bentrok, lalu aktifkan prefork
RUN rm -f /etc/apache2/mods-enabled/mpm_*.load \
    && a2enmod mpm_prefork

# 3. Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# 4. Ubah Document Root ke folder /public Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Konfigurasi Port Dinamis khusus untuk Railway
ENV PORT=8080
RUN sed -s -i -e "s/80/\${PORT}/" /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf

# 6. Copy Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 7. Set working directory & Copy proyek
WORKDIR /var/www/html
COPY . .

# 8. Install dependensi Laravel
RUN composer install --no-dev --optimize-autoloader

# 9. Set permission untuk storage dan cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
