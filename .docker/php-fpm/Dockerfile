FROM php:8.1-fpm-alpine

ARG ENVIRONMENT=local

RUN apk update \
    && apk add \
    $PHPIZE_DEPS \
    git \
    zlib-dev \
    libzip-dev \
    zip && \
    rm -rf /var/lib/apt/lists/*


# Install php extensions
RUN pecl install  igbinary \
    && docker-php-ext-enable igbinary  \
    && pecl install msgpack \
    && docker-php-ext-enable msgpack  \
    && docker-php-ext-install pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

WORKDIR /var/www

COPY start.sh /
RUN chmod +x /start.sh

CMD ["/start.sh"]

