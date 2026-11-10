FROM richarvey/nginx-php-fpm:latest

# Adiciona o repositório community do Alpine e instala o Node.js v20
RUN echo "https://dl-cdn.alpinelinux.org/alpine/v3.20/community" >> /etc/apk/repositories \
    && apk update \
    && apk add --no-cache nodejs~=20 npm

# Copia os arquivos do projeto para dentro do container
COPY . .

# Compila os assets do frontend (Vite / Tailwind / JS)
RUN npm install && npm run build

# Configurações do ambiente PHP/Nginx da imagem
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1

# Porta padrão exigida pelo Render
ENV PORT 10000
EXPOSE 10000