FROM debian:12

RUN apt-get update && apt-get install -y apache2 php-pgsql php locales && \
    echo "en_US.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen && \
    update-locale LANG=en_US.UTF-8

ENV LANG=en_US.UTF-8
ENV LC_ALL=en_US.UTF-8

WORKDIR /var/www/html

RUN rm index*

RUN sed -i '/<VirtualHost \*:80>/a \ \ \ \ \ \ \ \ DirectoryIndex registration.php\n' /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html

EXPOSE 80

CMD ["apache2ctl","-D","FOREGROUND"]
