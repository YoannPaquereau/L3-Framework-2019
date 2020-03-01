FROM php

# installation de composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# dépendances pour installation de symfony
RUN apt update -y
RUN apt install zip -y
RUN apt install git -y

RUN apt install libicu-dev -y \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) pcntl \
    && docker-php-ext-install -j$(nproc) pdo_mysql

RUN pecl install redis \
    && pecl install xdebug \
    && docker-php-ext-enable redis xdebug

RUN php -r "copy('https://get.symfony.com/cli/installer', '/tmp/installer.sh');";
RUN bash /tmp/installer.sh
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony
RUN rm -rf /tmp/installer.sh

ENV COMPOSER_HOME /tmp
WORKDIR /opt/project
