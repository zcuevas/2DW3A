# Partimos de la imagen oficial de PHP con Apache basado en Debian Bookworm
FROM php:8.3-apache-bookworm
# Instalación de extensiones de conector de base de datos MySQL / MariaDB
RUN docker-php-ext-install mysqli pdo_mysql
# Habilitar módulo rewrite de Apache para frameworks de DAW
RUN a2enmod rewrite
# Directorio de trabajo
WORKDIR /var/www/html
# Exponer el puerto HTTP estándar
EXPOSE 80