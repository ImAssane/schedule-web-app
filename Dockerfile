FROM php:8.3-fpm



RUN docker-php-ext-configure exif
RUN docker-php-ext-install exif

RUN apt-get update -y && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libzip-dev openssl zip unzip git -o Debug::pkgProblemResolver=yes

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip
    

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN set -ex apt-get install -y nodejs yarn npm 

RUN apt-get install -y nodejs npm


WORKDIR /var/www/html


COPY --chown=www-data:www-data . . 

RUN chown -R www-data:www-data /var/www/html/storage/logs
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache


ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update
RUN composer install
# --optimize-autoloader --no-dev

# Run ESLint
#RUN npx eslint . || true

# Install PHPStan
RUN composer require --dev phpstan/phpstan
#RUN vendor/bin/phpstan analyse src --level max

RUN chown -R www-data:www-data /var/www/html/vendor

RUN npm install --only=prod
RUN npm install --save-dev laravel-vite-plugin
RUN npm install eslint @typescript-eslint/parser @typescript-eslint/eslint-plugin --save-dev



RUN NODE_ENV=production npm run build

CMD  ["php-fpm", "-F"]