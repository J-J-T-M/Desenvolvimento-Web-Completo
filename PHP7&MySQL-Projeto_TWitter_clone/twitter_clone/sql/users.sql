create database twitter_clone;
create table users (
    id int not null primary key auto_increment,
    name varchar(100) not null,
    email varchar(255) not null,
    password varchar(32) not null
);