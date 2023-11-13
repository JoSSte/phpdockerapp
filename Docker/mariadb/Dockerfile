FROM mariadb:10.4

ADD ./SQL/CREATES/table_user.sql /docker-entrypoint-initdb.d
ADD ./SQL/CREATES/table_fruit.sql /docker-entrypoint-initdb.d

ADD ./SQL/DATALOAD/user.sql /docker-entrypoint-initdb.d
ADD ./SQL/DATALOAD/fruit.sql /docker-entrypoint-initdb.d

ENV MYSQL_DATABASE=userdb \
    MYSQL_ROOT_PASSWORD=test
EXPOSE 3306
