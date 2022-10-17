FROM nginx:alpine
COPY docker/nginx/default.conf /etc/nginx/conf.d
COPY ./app/ /var/www/html

# RUN chown -R www-data:www-data public