FROM php:8.0-fpm

RUN apt-get update && apt-get install -y unixodbc-dev
RUN pecl install sqlsrv pdo_sqlsrv \    
    && docker-php-ext-enable pdo_sqlsrv
RUN apt-get update && apt-get install -y gnupg2 libodbc1 odbcinst1debian2

RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/ubuntu/20.04/prod.list > /etc/apt/sources.list.d/mssql-release.list
RUN exit
RUN apt-get update
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql17
RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bash_profile
RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc



WORKDIR /var/www


# RUN set -ex \
#     &&{ \
#     echo 'clear_env = no'; \
#     }

COPY --from=composer /usr/bin/composer /usr/bin/composer

CMD composer install ; php-fpm
EXPOSE 9000