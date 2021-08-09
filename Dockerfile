FROM php:7.4-fpm
USER root

# Copy composer.lock and composer.json
COPY ./laravel/composer.lock ./laravel/composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev \
    libfreetype6 \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    libonig-dev libpq-dev \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
#RUN groupadd -g 1000 www-data
#RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY --chown=www-data:www-data ./laravel /var/www
RUN chmod -R 755 /var/www/storage

#ADD . /var/www
#RUN chown -R www-data:www-data /var/www

## Copy existing application directory permissions
#COPY --chown=www:www . /var/www
##COPY --chown=www:www ./laravel /var/www
#RUN chown -R www:www /var/www
#
## Change current user to www
#USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]


