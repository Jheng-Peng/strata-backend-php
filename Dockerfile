FROM php:8.2-cli

# 安装 PostgreSQL 扩展（关键）
RUN apt-get update && apt-get install -y libpq-dev \
  && docker-php-ext-install pgsql pdo_pgsql

# 设置工作目录
WORKDIR /var/www/html

# 拷贝所有内容到容器中
COPY . .

# 启动 PHP 内建服务器监听 10000 端口，根目录为 public/
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]