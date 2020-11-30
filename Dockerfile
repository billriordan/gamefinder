FROM nginx:1.7.9
COPY ./ /var/www/html
RUN ls -al /var/www/html

COPY nginx.conf /etc/nginx/nginx.conf

EXPOSE 80
