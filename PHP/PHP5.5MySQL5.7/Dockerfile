FROM php:5.5-fpm
#Set working directory
WORKDIR /var/www

USER root

#Copy existing application directory contents
COPY . /var/www

RUN docker-php-ext-install mysql && docker-php-ext-enable mysql

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
    #https://social.msdn.microsoft.com/Forums/windowsServer/en-US/a48c4b67-8da7-4ea4-bcb6-caa089413cfc/php-fatal-error-call-to-undefined-function-imagefttext?forum=windowsazurewebsitespreview
	&& docker-php-ext-configure gd --with-freetype-dir=/usr --with-jpeg-dir=/usr \
	&& docker-php-ext-install -j$(nproc) gd pdo_mysql


#Copy existing application directory permissions
COPY --chown=www:www . /var/www
#Change current user to www
#USER www

EXPOSE 9000
CMD ["php-fpm"]