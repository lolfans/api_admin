FROM liudashuai/docker-nginx-php-supervisor-simple:latest AS base1
COPY ./ /usr/share/nginx/html/
COPY ./.env.sandbox /usr/share/nginx/html/.env
#COPY ./supervisor/  /etc/supervisor/conf.d/
WORKDIR /usr/share/nginx/html/
Run composer install

FROM liudashuai/docker-nginx-php-supervisor-simple:latest
RUN mkdir -p /usr/share/nginx/html/vendor
COPY --from=base1 /usr/share/nginx/html/vendor/ /usr/share/nginx/html/vendor/
WORKDIR /usr/share/nginx/html/




