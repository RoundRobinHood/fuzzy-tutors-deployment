FROM composer:2 as composer

COPY src/ /app

WORKDIR /app/doc_root/api

RUN composer install --no-dev --optimize-autoloader

FROM php:8.2-apache

COPY --from=composer /app/ /app

RUN docker-php-ext-install mysqli

RUN apt-get update && \
    apt-get install -y default-mysql-client netcat-traditional && \
    rm -rf /var/lib/apt/lists/*

COPY config.php /app/doc_root/api
COPY apache.conf /etc/apache2/conf-available/my-htaccess.conf
COPY ssl.conf /etc/apache2/sites-available/ssl.conf

RUN a2enmod rewrite ssl headers

RUN a2enconf my-htaccess
RUN a2ensite ssl

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]

CMD ["apache2-foreground"]
