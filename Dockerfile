FROM registry.cn-qingdao.aliyuncs.com/liudashuai/nginx-php-supervisor-laravel:latest

RUN cd /usr/share/nginx/html
RUN composer install
COPY / /usr/share/nginx/html/
COPY /.env.sandbox /usr/share/nginx/html/.env
COPY /supervisor/  /etc/supervisor/conf.d/