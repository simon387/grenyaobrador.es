-- create database
drop schema if exists grenyaobrador;
create schema grenyaobrador;




-- create roles
drop table if exists role_;
create table role_
(
    id   int auto_increment primary key,
    name varchar(255) not null,
    constraint role__name_uindex unique (name)
);
-- insert default roles
INSERT INTO role_ (name) VALUES ('admin');
INSERT INTO role_ (name) VALUES ('super-admin');




-- create user table
drop table if exists user_;
create table user_
(
    id    int auto_increment primary key,
    email varchar(255) not null,
    name  varchar(255) not null,
    pass  varchar(255) not null,
    role  int          not null,
    constraint user__role__id_fk foreign key (role) references role_ (id)
);
-- insert default users
INSERT INTO user_ (email, name, pass, role) VALUES ('tati@grenyaobrador.es', 'Tatiana Correa', 'pass', 1); -- admin
INSERT INTO user_ (email, name, pass, role) VALUES ('simone.celia@simonecelia.it', 'Simone Celia', '', 2); -- super-admin




-- create category table
drop table if exists category;
create table category
(
    id   int auto_increment primary key,
    name varchar(255) not null
);
-- insert default category
INSERT INTO category (name) VALUES ('sin categoría');




-- create table period
drop table if exists period;
create table period
(
    id     int auto_increment primary key,
    start  timestamp        null,
    end    timestamp        null,
    actual bit default b'1' not null
);
-- insert default value
INSERT INTO period (start, end, actual) VALUES ('2022-01-13 21:43:56', null, true);




-- supplir
drop table if exists supplier;
CREATE TABLE supplier
(
    id   int(11) auto_increment primary key,
    name varchar(255) NOT NULL
);
-- defaults
INSERT INTO supplier (id, name) VALUES (1, 'sin proveedor');
INSERT INTO supplier (id, name) VALUES (2, 'proveedor#1');
INSERT INTO supplier (id, name) VALUES (3, 'proveedor#2');




-- table product
drop table if exists product;
create table product
(
    id       int auto_increment primary key,
    category int           not null,
    name     varchar(255)  not null,
    supplier int           not null,
    unit     varchar(255)  null,
    deposit0 decimal(9, 2) null,
    deposit1 decimal(9, 2) null,
    outflow0 decimal(9, 2) null,
    outflow1 decimal(9, 2) null,
    `left`   decimal(9, 2) null,
    `period` int null,
    note     varchar(255)  null,
    constraint product_category_id_fk
        foreign key (category) references category (id),
    constraint product_period_id_fk
        foreign key (period) references period (id)
            on delete cascade,
    constraint product_supplier_id_fk
        foreign key (supplier) references supplier (id)
);
-- defaults
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Durum', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Masa lenta', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Espelta', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Harina normal', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Harina de fuerza', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Malta tostada', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Rey loco', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Centeno integral', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Sarraceno', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Pasta oliva', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Olivas', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Avellanas', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Nueces', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Pasas', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Semillas', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Sal', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Azucar', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Mantequilla', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Levadura', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'T-80 piedra', 2, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Brownie', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Tartas queso', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Coulant', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Muffins manzana', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Muffins choco', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Cookies', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Coca llardons', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Tarta manzana', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Cañas crema', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Cañas cabello', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Croissant choco', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Croissant mantequilla', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Briox', 3, null, null, null, null, null, 1, null, null);
INSERT INTO product (category, name, supplier, unit, deposit0, outflow0, outflow1, `left`, period, note, deposit1) VALUES (1, 'Carrot', 3, null, null, null, null, null, 1, null, null);




-- table operation
drop table if exists operation;
create table operation
(
    id          int auto_increment primary key,
    user_       int                                   not null,
    timestamp   timestamp default current_timestamp() not null on update current_timestamp(),
    product     int                                   null,
    description varchar(255)                          null,
    constraint operation_product_id_fk
        foreign key (product) references product (id)
            on delete set null,
    constraint operation_user__id_fk
        foreign key (user_) references user_ (id)
);


