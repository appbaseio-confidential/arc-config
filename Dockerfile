FROM php:7.4-fpm-alpine3.15


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
RUN mkdir /reactivesearch-data && chmod +x /var/www/html/*.sh && adduser -D -g 'www' www && chown -R www:www /var/www/ && chmod -R 777 /reactivesearch-data && chown -R www:www /reactivesearch-data && touch /reactivesearch-data/es.json && chmod -R 777 /reactivesearch-data/es.json && touch /reactivesearch-data/pipeline.json && chmod -R 777 /reactivesearch-data/pipeline.json
# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["sh", "-c", "/var/www/html/starter.sh"]

