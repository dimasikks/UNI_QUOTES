FROM debian:12

RUN apt-get update && apt-get install -y apache2 php-pgsql php

WORKDIR /var/www/html

RUN rm /var/www/html/index*

RUN sed -i '/<VirtualHost \*:80>/a \ \ \ \ \ \ \ \ DirectoryIndex registration.php\n' /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html

EXPOSE 80

CMD ["apache2ctl","-D","FOREGROUND"]
