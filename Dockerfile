FROM richarvey/nginx-php-fpm:latest

# Instala ferramentas necessárias para baixar o Node.js oficial
RUN apk add --no-cache curl tar

# Baixa e instala o Node.js v20 (LTS) diretamente do binário oficial
ENV NODE_VERSION=20.12.2
RUN curl -fsSL https://nodejs.org/dist/v$NODE_VERSION/node-v$NODE_VERSION-linux-x64.tar.xz -o node.tar.xz \
    && tar -xJf node.tar.xz -C /usr/local --strip-components=1 \
    && rm node.tar.xz

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