
FROM php:8.1-apache
# Enable PDO SQLite extension (for demo DB)
RUN apt-get update && apt-get install -y sqlite3 libsqlite3-dev && docker-php-ext-install pdo pdo_sqlite
COPY . /var/www/html/
EXPOSE 80
