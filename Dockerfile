FROM ndamiens/nginx-php:latest
ADD src propel.xml.dist schema.xml bootstrap.php /opt/app/
RUN apt-get update && apt-get install -y cron \
	&& rm -rf /var/lib/apt/lists/*
ADD composer.json composer.lock /opt/app/
RUN composer install -o
