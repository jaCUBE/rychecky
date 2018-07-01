FROM php:7.1-apache-stretch

LABEL maintainer="Jakub Rychecký <jakub@rychecky.cz>" \
      description="PHP 7.2 with Apache for rychecky.cz"

ENV BUILD_DATE 2018-07-02

RUN apt-get update \
    && apt-get upgrade -y \
    # Basic Linux stuff
    && apt-get install -y curl wget gnupg2 nano mtr nmap \
    # PDO MySQL driver
    && docker-php-ext-install pdo_mysql \
    # mod_rewrite for Apache
    && a2enmod rewrite \
    && service apache2 restart \
    # Composer installation
    && php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    # Timezone settings
    && unlink /etc/localtime \
    && ln -s /usr/share/zoneinfo/Europe/Prague /etc/localtime \
    # Cleanup
    && apt-get autoclean

# PHP config
COPY 40-custom-php.ini /etc/php/7.2/apache2/conf.d/40-custom-php.ini