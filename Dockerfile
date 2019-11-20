FROM php:7.2-fpm


# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    apt-transport-https \
    ca-certificates \
    gnupg2 \
    software-properties-common && curl -fsSL https://download.docker.com/linux/$(. /etc/os-release; echo "$ID")/gpg > /tmp/dkey; apt-key add /tmp/dkey && \
    add-apt-repository \
    "deb [arch=amd64] https://download.docker.com/linux/$(. /etc/os-release; echo "$ID") \
    $(lsb_release -cs) \
    stable" && \
    apt-get update && \
    apt-get -y install docker-ce && apt-get clean && rm -rf /var/lib/apt/lists/* && groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash -g www www

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www/html
RUN mkdir /arc-data && chmod +x /var/www/html/*.sh

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["sh", "-c", "/var/www/html/starter.sh"]

