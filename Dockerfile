FROM registry.cn-qingdao.aliyuncs.com/liudashuai/nginx-php-supervisor-laravel:latest
COPY ./ /usr/share/nginx/html/
COPY ./.env.sandbox /usr/share/nginx/html/.env
COPY ./supervisor/  /etc/supervisor/conf.d/

WORKDIR /usr/share/nginx/html/
RUN composer config -g repo.packagist composer https://packagist.phpcomposer.com
RUN composer install
RUN mkdir -p /usr/share/nginx/html/testbuild
COPY /usr/share/nginx/html/vendor  /usr/share/nginx/html/