FROM php:8.3
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /app
COPY . /app
RUN cp .env.example .env
RUN composer install
CMD php -S 0.0.0.0:8000 -t public/
EXPOSE 8000