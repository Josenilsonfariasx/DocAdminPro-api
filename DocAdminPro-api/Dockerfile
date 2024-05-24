# Use a imagem oficial do PHP com FPM
FROM php:8.2-fpm

# Instale as dependências do sistema e extensões PHP necessárias
RUN apt-get update && apt-get install -y \
  libpq-dev \
  libzip-dev \
  zip \
  unzip \
  git \
  libmagickwand-dev \
  && docker-php-ext-install pdo_pgsql zip pcntl \
  && pecl install imagick \
  && docker-php-ext-enable imagick

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Copie os arquivos do projeto
COPY . .

# Instale as dependências do Composer
RUN composer install --optimize-autoloader --no-dev

# Defina as permissões necessárias
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Defina o comando padrão para iniciar o PHP-FPM e o Horizon
CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=80 & php artisan horizon"]