FROM liudashuai/docker-nginx-php-supervisor-simple:latest AS base
COPY ./ /usr/share/nginx/html/
COPY ./.env.sandbox /usr/share/nginx/html/.env
COPY ./supervisor/  /etc/supervisor/conf.d/
WORKDIR /usr/share/nginx/html/
Run composer install

FROM liudashuai/docker-nginx-php-supervisor-simple:latest
COPY --from=base /usr/share/nginx/html/ /usr/share/nginx/html/
WORKDIR /usr/share/nginx/html/




