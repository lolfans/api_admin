FROM liudashuai/docker-nginx-php-supervisor-simple:latest

COPY ./ /usr/share/nginx/html/
COPY ./.env.sandbox /usr/share/nginx/html/.env
COPY ./supervisor/  /etc/supervisor/conf.d/

RUN mkdir -p /usr/share/nginx/html/logistics-pause/dist

WORKDIR /usr/share/nginx/html/
