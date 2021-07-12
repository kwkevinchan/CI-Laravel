FROM nginx:1.19.6-alpine

RUN mkdir -p /var/www/app/
RUN touch /var/www/app/index.php

COPY ./nginx.conf /etc/nginx/conf.d/default.conf
