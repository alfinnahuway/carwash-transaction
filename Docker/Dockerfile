FROM php:7.4-fpm
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \ 
	&& docker-php-ext-install pdo_pgsql pgsql \
	&& docker-php-ext-install mysqli \
	&& docker-php-ext-enable mysqli
	
WORKDIR /var/www/queen-steam
COPY ../ .
EXPOSE 9000
