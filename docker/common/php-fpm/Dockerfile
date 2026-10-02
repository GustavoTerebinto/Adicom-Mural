# ---------- Estágio 1: Builder ----------
FROM php:8.3-fpm AS builder

RUN apt-get update && apt-get install -y --no-install-recommends \
    curl unzip libpq-dev libonig-dev libssl-dev libxml2-dev \
    libcurl4-openssl-dev libicu-dev libzip-dev \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql pdo_pgsql pgsql intl zip bcmath soap \
    && pecl install redis && docker-php-ext-enable redis \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www
COPY . /var/www

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# ---------- Estágio 2: Production ----------
FROM php:8.3-fpm AS production

RUN apt-get update && apt-get install -y --no-install-recommends \
    libpq-dev libicu-dev libzip-dev libfcgi-bin procps \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=builder /usr/local/lib/php/extensions/ /usr/local/lib/php/extensions/
COPY --from=builder /usr/local/etc/php/conf.d/ /usr/local/etc/php/conf.d/
COPY --from=builder /var/www /var/www

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && chown -R www-data:www-data /var/www

WORKDIR /var/www
USER www-data
EXPOSE 9000
CMD ["php-fpm"]

# ---------- Estágio 3: Development (com Xdebug) ----------
FROM production AS development

ARG XDEBUG_ENABLED=true
ARG XDEBUG_HOST=host.docker.internal
ARG UID=1000
ARG GID=1000

USER root

RUN if [ "$XDEBUG_ENABLED" = "true" ]; then \
    pecl install xdebug && docker-php-ext-enable xdebug && \
    { echo "xdebug.mode=develop,coverage,debug"; \
      echo "xdebug.client_host=${XDEBUG_HOST}"; \
      echo "xdebug.idekey=DOCKER"; \
      echo "xdebug.start_with_request=yes"; \
    } >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini ; \
    fi

RUN if getent group ${GID}; then \
      useradd -m -u ${UID} -g ${GID} -s /bin/bash www; \
    else \
      groupadd -g ${GID} www && useradd -m -u ${UID} -g www -s /bin/bash www; \
    fi \
    && sed -i "s/user = www-data/user = www/g" /usr/local/etc/php-fpm.d/www.conf \
    && sed -i "s/group = www-data/group = www/g" /usr/local/etc/php-fpm.d/www.conf

WORKDIR /var/www
USER www
EXPOSE 9000
CMD ["php-fpm"]