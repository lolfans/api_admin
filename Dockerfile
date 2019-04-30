FROM liudashuai/docker-nginx-php-supervisor-simple:latest AS base1
WORKDIR /usr/share/nginx/html/
COPY / /usr/share/nginx/html/ && composer install
COPY /.env.sandbox /usr/share/nginx/html/.env
COPY /supervisor/  /etc/supervisor/conf.d/


FROM liudashuai/docker-nginx-php-supervisor-simple:latest
RUN mkdir -p /usr/share/nginx/html/vendor
COPY --from=base1 /usr/share/nginx/html/ /usr/share/nginx/html/
WORKDIR /usr/share/nginx/html/




