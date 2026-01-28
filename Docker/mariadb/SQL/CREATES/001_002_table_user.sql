create table user(
    username varchar(50) unique not null,
    email varchar(55) not null, 
    create_date timestamp default current_timestamp

);
