FROM php:7.2-apache-stretch

LABEL maintainer="Jakub Rychecký <jakub@rychecky.cz>" \
      description="PHP 7.2 with Apache for rychecky.cz"

RUN apt-get update \
    && apt-get upgrade -y \
    # Basic Linux stuff
    && apt-get install -y curl \
                          gnupg2 \
                          glances \
                          mtr \
                          nano \
                          mc \
                          wget \
    # PDO MySQL driver
    && docker-php-ext-install pdo_mysql \
    # mod_rewrite for Apache
    && a2enmod rewrite \
    && service apache2 restart \
    # Composer installation
    && php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \

    # Node.js and related tools
    && curl -sL https://deb.nodesource.com/setup_11.x | bash - \
    && apt-get install -y nodejs \
    # Timezone settings
    && unlink /etc/localtime \
    && ln -s /usr/share/zoneinfo/Europe/Prague /etc/localtime \
    # Cleanup
    && apt-get autoclean

RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache

#RUN pecl install xdebug-2.6.1 \
#    && docker-php-ext-enable xdebug

# PHP config
COPY 40-custom-php.ini /etc/php/7.2/apache2/conf.d/40-custom-php.ini