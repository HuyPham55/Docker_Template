FROM php:7.4-fpm

# Copy composer.lock and composer.json
COPY composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
USER root

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd pdo_mysql

RUN docker-php-ext-install exif

#https://github.com/mlocati/docker-php-extension-installer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory permissions
# https://stackoverflow.com/questions/48619445/permission-denied-error-using-laravel-docker
# https://stackoverflow.com/questions/4917811/file-put-contents-failed-to-open-stream-permission-denied
# chown uses less image size
# COPY --chown=www-data:www-data . /var/www
ADD --chown=www-data:www-data . /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
