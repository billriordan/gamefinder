FROM php:7.2
COPY ./ /app/root/
RUN ls -l /app/root/
CMD ["php","-S","0.0.0.0:80","-t","/app/root/public"]
