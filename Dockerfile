FROM php:7.2-fpm-alpine3.9


# Install dependencies
RUN apk add --update \
    lighttpd \
    curl \
    openrc \
    docker \
    && apk update && rc-update add docker boot

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www/html
RUN mkdir /arc-data && chmod +x /var/www/html/*.sh && adduser -D -g 'www' www && chown -R www:www /var/www/
# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["sh", "-c", "/var/www/html/starter.sh"]

