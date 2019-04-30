FROM liudashuai/docker-nginx-php-supervisor-simple:latest AS base1
WORKDIR /usr/share/nginx/html/
ADD ./ /usr/share/nginx/html/ && composer install
ADD ./.env.sandbox /usr/share/nginx/html/.env
ADD ./supervisor/  /etc/supervisor/conf.d/


FROM liudashuai/docker-nginx-php-supervisor-simple:latest
RUN mkdir -p /usr/share/nginx/html/vendor
COPY --from=base1 /usr/share/nginx/html/ /usr/share/nginx/html/
WORKDIR /usr/share/nginx/html/




