FROM trafex/alpine-nginx-php7
MAINTAINER appbase.io <info@appbase.io>

ADD . /var/www/html
EXPOSE 8080
