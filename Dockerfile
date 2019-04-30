FROM liudashuai/docker-nginx-php-supervisor-simple:latest AS base1

COPY / /usr/share/nginx/html/ 
COPY /.env.sandbox /usr/share/nginx/html/.env
COPY /supervisor/  /etc/supervisor/conf.d/
RUN mkdir -p /usr/share/nginx/html/vendor
WORKDIR /usr/share/nginx/html/
RUN composer install
WORKDIR /
RUN find -name php-console-color

FROM liudashuai/docker-nginx-php-supervisor-simple:latest
COPY --from=base1 ./root/.composer/cache/files/ /usr/share/nginx/html/vendor/




