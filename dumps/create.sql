-- create database
create schema grenyaobrador;

-- create roles
create table role_
(
    id   int auto_increment
        primary key,
    name varchar(255) not null,
    constraint role__name_uindex unique (name)
);
-- insert default roles
INSERT INTO role_ (name, id) VALUES ('admin', 1);
INSERT INTO role_ (name, id) VALUES ('tati', 2);
