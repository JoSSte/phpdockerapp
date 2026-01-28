FROM mariadb:10.4

ADD ./SQL/CREATES/001_002_table_user.sql /docker-entrypoint-initdb.d
ADD ./SQL/CREATES/001_001_table_fruit.sql /docker-entrypoint-initdb.d

ADD ./SQL/DATALOAD/002_002_user.sql /docker-entrypoint-initdb.d
ADD ./SQL/DATALOAD/002_001_fruit.sql /docker-entrypoint-initdb.d

ENV MYSQL_DATABASE=userdb \
    MYSQL_ROOT_PASSWORD=test
EXPOSE 3306
