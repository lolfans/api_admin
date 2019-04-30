FROM liudashuai/docker-nginx-php-supervisor-simple:latest AS base1

COPY / /usr/share/nginx/html/ 
COPY /.env.sandbox /usr/share/nginx/html/.env
COPY /supervisor/  /etc/supervisor/conf.d/
RUN mkdir -p /usr/share/nginx/html/vendor
WORKDIR /usr/share/nginx/html/
RUN composer install
WORKDIR /
Run find -name php-console-color
COPY ./root/.composer/cache/files/ /usr/share/nginx/html/vendor/




