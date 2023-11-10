FROM mysql:5.6
ADD ./blogsite.sql /docker-entrypoint-initdb.d
ENV MYSQL_DATABASE=blogsite \
    MYSQL_ROOT_PASSWORD=test
EXPOSE 3306
