FROM mysql:5.6
ADD ./SQL/CREATES/tables.sql /docker-entrypoint-initdb.d
ADD ./SQL/DATALOAD/users.sql /docker-entrypoint-initdb.d
ENV MYSQL_DATABASE=userdb \
    MYSQL_ROOT_PASSWORD=test
EXPOSE 3306
