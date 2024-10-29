FROM debian:12

RUN apt-get update && apt-get install -y apache2 php-pgsql php

WORKDIR /var/www/html

COPY . /var/www/html

EXPOSE 80

CMD ["apache2ctl","-D","FOREGROUND"]
