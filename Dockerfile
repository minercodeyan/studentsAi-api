FROM php:8.0-apache
RUN apt-get update && apt-get install -y zlib1g-dev libpng-dev libzip-dev\
    && docker-php-ext-install pdo pdo_mysql mysqli zip gd
RUN a2enmod rewrite

RUN apt-get install -y --no-install-recommends \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxpm-dev \
    libvpx-dev \
&& docker-php-ext-configure gd \
    --with-xpm=/usr/include/ \
    --with-jpeg=/usr/include/ \
    --with-freetype=/usr/include/ \
&& docker-php-ext-install gd

RUN apt-get update -y
RUN apt-get install -y libmcrypt-dev
RUN pecl install mcrypt-1.0.4

RUN apt-get install -y \
      ca-certificates \
      unzip

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# latest RabbitMQ 4.0.x
docker run -it --rm --name rabbitmq -p 5672:5672 -p 15672:15672 rabbitmq:4.0-management
