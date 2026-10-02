FROM php:8.3-cli

ARG UID=1000
ARG GID=1000
ARG NODE_VERSION=22

RUN apt-get update && apt-get install -y --no-install-recommends \
    curl unzip git libpq-dev libonig-dev libssl-dev libxml2-dev \
    libcurl4-openssl-dev libicu-dev libzip-dev sudo \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql pdo_pgsql pgsql intl zip bcmath soap \
    && pecl install redis && docker-php-ext-enable redis \
    && curl -sS https://getcomposer.org/installer | php -- \
       --install-dir=/usr/local/bin --filename=composer \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN if getent group ${GID}; then \
      useradd -m -u ${UID} -g ${GID} -s /bin/bash www; \
    else \
      groupadd -g ${GID} www && useradd -m -u ${UID} -g www -s /bin/bash www; \
    fi \
    && usermod -aG sudo www \
    && echo 'www ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

USER www
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.0/install.sh | bash \
    && export NVM_DIR="$HOME/.nvm" \
    && . "$NVM_DIR/nvm.sh" \
    && nvm install ${NODE_VERSION} \
    && nvm alias default ${NODE_VERSION} \
    && echo 'export NVM_DIR="$HOME/.nvm"' >> ~/.bashrc \
    && echo '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"' >> ~/.bashrc

WORKDIR /var/www
ENTRYPOINT []
CMD ["bash"]