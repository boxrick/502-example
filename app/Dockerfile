FROM php:7.3-apache

ENV TZ=Europe/London
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && \
    echo $TZ > /etc/timezone

# General install libs/apps
RUN apt-get update && \
    apt-get install -y ssl-cert && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    a2enmod rewrite ssl && \

# Make the log directory writable
    chmod ugo+w /var/log

# Copy ENV set port
RUN sed -i 's/443/${PORT}/g' /etc/apache2/sites-available/default-ssl.conf /etc/apache2/ports.conf && \
    ln -s /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-enabled/default-ssl.conf

# Configure PHP
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Copy local code to the container image.
COPY index.php /var/www/html/

EXPOSE 443
ENV PORT=443
