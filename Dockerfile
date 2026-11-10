FROM richarvey/nginx-php-fpm:latest

# Instala Node.js e NPM para compilar os assets do Vite
RUN apk add --update nodejs npm

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