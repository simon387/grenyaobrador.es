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

-- create user table
create table user_
(
    id    int auto_increment
        primary key,
    email varchar(255) not null,
    name  varchar(255) not null,
    pass  varchar(255) not null,
    role  int          not null,
    constraint user__role__id_fk foreign key (role) references role_ (id)
);
-- insert default users
INSERT INTO user_ (email, name, pass, role) VALUES ('tati@almacen.com', 'Tati', 'pass', 2);
INSERT INTO user_ (email, name, pass, role) VALUES ('simone.celia@simonecelia.it', 'Simone Celia', '', 1);

-- create category table
create table category
(
    id   int auto_increment
        primary key,
    name varchar(255) not null
);
-- insert default category
INSERT INTO category (name) VALUES ('sin categoría');

-- create table period
create table period
(
    id     int auto_increment
        primary key,
    start  timestamp        null,
    end    timestamp        null,
    actual bit default b'1' not null
);
-- insert default value
INSERT INTO period (start, end, actual) VALUES ('2020-12-19 21:43:56', null, true);

-- supplir
CREATE TABLE supplier
(
    id   int(11) primary key,
    name varchar(255) NOT NULL
);
-- defaults
INSERT INTO supplier (id, name) VALUES (1, 'sin proovedor');

-- table product
create table product
(
    id       int auto_increment
        primary key,
    category int           not null,
    name     varchar(255)  not null,
    supplier int           not null,
    unit     varchar(255)  null,
    deposit  decimal(9, 2) null,
    outflow0 decimal(9, 2) null,
    outflow1 decimal(9, 2) null,
    `left`   decimal(9, 2) null,
    period int null,
    note     varchar(255)  null,
    constraint product_category_id_fk
        foreign key (category) references category (id),
    constraint product_period_id_fk
        foreign key (period) references period (id)
            on delete cascade,
    constraint product_supplier_id_fk
        foreign key (supplier) references supplier (id)
);

-- table operation
create table operation
(
    id          int auto_increment
        primary key,
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