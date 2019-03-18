FROM registry.cn-qingdao.aliyuncs.com/liudashuai/nginx-php-supervisor-laravel:latest
COPY / /usr/share/nginx/html/
COPY /.env.sandbox /usr/share/nginx/html/.env
COPY /supervisor/  /etc/supervisor/conf.d/
WORKDIR /usr/share/nginx/html
