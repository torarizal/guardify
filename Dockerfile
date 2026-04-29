# Menggunakan image resmi PHP 8.4 dengan Apache
FROM php:8.4-apache

# FIX ERROR APACHE: Matikan mpm_event/worker yang bentrok dan pastikan prefork aktif
RUN a2dismod mpm_event mpm_worker || true
RUN a2enmod mpm_prefork

# Install dependensi sistem dan ekstensi PHP untuk MySQL
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql zip

# Aktifkan mod_rewrite Apache untuk routing Laravel
RUN a2enmod rewrite

# Ubah root direktori Apache ke folder /public Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy Composer dari image resminya
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy seluruh file proyek ke dalam container
COPY . .

# Install dependensi Laravel (tanpa package development)
RUN composer install --no-dev --optimize-autoloader

# Berikan hak akses (permission) ke folder storage dan cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Buka port 80
EXPOSE 80
