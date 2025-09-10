# Use a imagem base oficial do PHP com Apache
FROM php:8.3-apache

# Instale sudo e outras dependências
RUN apt-get update && apt-get install -y sudo curl unzip \
    && rm -rf /var/lib/apt/lists/*

# Instale Node.js LTS
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs

# Habilite o módulo mod_rewrite do Apache
RUN a2enmod rewrite

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Ajuste UID/GID se necessário
ARG user_id=1000
ARG group_id=1000
RUN if [ -n "${user_id}" ] && [ "$(id -u www-data)" != "${user_id}" ]; then usermod -u ${user_id} www-data; fi \
 && if [ -n "${group_id}" ] && [ "$(getent group www-data | cut -d: -f3)" != "${group_id}" ]; then groupmod -g ${group_id} www-data; fi

# Ajuste permissões
RUN chown -R www-data:www-data /var/www/html

# Exponha a porta 80
EXPOSE 80

# Inicia o Apache
CMD ["apache2-foreground"]
