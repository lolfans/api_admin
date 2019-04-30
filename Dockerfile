FROM liudashuai/docker-nginx-php-supervisor-simple:latest AS base1

COPY / /usr/share/nginx/html/ 
COPY /.env.sandbox /usr/share/nginx/html/.env
COPY /supervisor/  /etc/supervisor/conf.d/
RUN mkdir -p /usr/share/nginx/html/vendor
WORKDIR /usr/share/nginx/html/
RUN cd /usr/share/nginx/html/ && composer install && cp /usr/share/nginx/html/vendor/  /usr/share/nginx/html/vendor/

FROM liudashuai/docker-nginx-php-supervisor-simple:latest
RUN mkdir -p /usr/share/nginx/html/vendor
COPY --from=base1 /usr/share/nginx/html/ /usr/share/nginx/html/
COPY --from=base1 ./root/.composer/cache/files/ /usr/share/nginx/html/vendor/
WORKDIR /usr/share/nginx/html/



