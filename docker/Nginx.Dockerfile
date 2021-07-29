FROM nginx

ADD docker/conf/vhost.conf /etc/nginx/conf.d/default.conf

COPY composer.lock composer.json /var/www/

WORKDIR /var/www/laravel-docker
