FROM php:8.2-fpm

RUN apt-get update --fix-missing 
RUN apt-get install -y zip unzip libonig-dev libicu-dev
RUN apt-get install -y libzip-dev libssl-dev zlib1g-dev
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo zip pdo_mysql opcache
RUN docker-php-ext-enable pdo zip pdo_mysql opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www
WORKDIR /var/www

RUN mkdir -p /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 777 /var/www/storage /var/www/bootstrap/cache

RUN composer install

RUN php artisan key:generate
RUN php artisan view:cache

CMD ["php-fpm"]
