FROM php:7.2-fpm
# Set working directory
WORKDIR /var/www


#RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
#RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
#RUN docker-php-ext-install gd


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

USER root

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www
# Change current user to www
#USER www

EXPOSE 9000
CMD ["php-fpm"]