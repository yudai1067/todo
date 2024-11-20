FROM public.ecr.aws/docker/library/nginx:1.27.2
ENV FASTCGI_PASS=127.0.0.1:9000
COPY ./src/public /var/www/html/public
COPY docker/nginx/templates /etc/nginx/templates
VOLUME ["/var/www/html/public"]
EXPOSE 80
