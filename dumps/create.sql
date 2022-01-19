-- create database
DROP SCHEMA IF EXISTS grenyaobrador;
CREATE SCHEMA grenyaobrador;




-- create roles
DROP TABLE IF EXISTS role_;
CREATE TABLE role_
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    CONSTRAINT role__name_uindex UNIQUE (name)
);
-- insert default roles
INSERT INTO role_ (name) VALUES ('admin');
INSERT INTO role_ (name) VALUES ('super-admin');




-- create user table
DROP TABLE IF EXISTS user_;
CREATE TABLE user_
(
    id    INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name  VARCHAR(255) NOT NULL,
    pass  VARCHAR(255) NOT NULL,
    role  INT          NOT NULL,
    CONSTRAINT user__role__id_fk FOREIGN KEY (role) REFERENCES role_ (id)
);
-- insert default users
INSERT INTO user_ (email, name, pass, role) VALUES ('tati@grenyaobrador.es', 'Tatiana Correa', 'pass', 1); -- admin
INSERT INTO user_ (email, name, pass, role) VALUES ('simone.celia@simonecelia.it', 'Simone Celia', '', 2); -- super-admin




-- create category table
DROP TABLE IF EXISTS category;
CREATE TABLE category
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
-- insert default category
INSERT INTO category (name) VALUES ('sin categoría');




-- create table period
DROP TABLE IF EXISTS period;
CREATE TABLE period
(
    id     INT AUTO_INCREMENT PRIMARY KEY,
    start  TIMESTAMP        NULL,
    end    TIMESTAMP        NULL,
    actual BIT DEFAULT b'1' NOT NULL
);
-- insert default value
INSERT INTO period (start, end, actual) VALUES ('2022-01-13 21:43:56', NULL, TRUE);




-- supplir
DROP TABLE IF EXISTS supplier;
CREATE TABLE supplier
(
    id   INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
-- defaults
INSERT INTO supplier (id, name) VALUES (1, 'sin proveedor');
INSERT INTO supplier (id, name) VALUES (2, 'proveedor#1');
INSERT INTO supplier (id, name) VALUES (3, 'proveedor#2');




-- table product
DROP TABLE IF EXISTS product;
CREATE TABLE product
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    category INT           NOT NULL,
    name     VARCHAR(255)  NOT NULL,
    supplier INT           NOT NULL,
    unit     VARCHAR(255)  NULL,
    deposit0 DECIMAL(9, 2) NULL,
    deposit1 DECIMAL(9, 2) NULL,
    outflow0 DECIMAL(9, 2) NULL,
    outflow1 DECIMAL(9, 2) NULL,
    `left`   DECIMAL(9, 2) NULL,
    `period` INT NULL,
    note     VARCHAR(255)  NULL,
    CONSTRAINT product_category_id_fk
        FOREIGN KEY (category) REFERENCES category (id),
    constraint product_period_id_fk
        FOREIGN KEY (period) REFERENCES period (id)
            ON DELETE CASCADE,
    CONSTRAINT product_supplier_id_fk
        FOREIGN KEY (supplier) REFERENCES supplier (id)
);
-- defaults
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Durum', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Masa lenta', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Espelta', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Harina normal', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Harina de fuerza', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Malta tostada', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Rey loco', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Centeno integral', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Sarraceno', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Pasta oliva', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Olivas', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Avellanas', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Nueces', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Pasas', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Semillas', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Sal', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Azucar', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Mantequilla', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Levadura', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'T-80 piedra', 2, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Brownie', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Tartas queso', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Coulant', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Muffins manzana', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Muffins choco', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Cookies', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Coca llardons', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Tarta manzana', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Cañas crema', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Cañas cabello', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Croissant choco', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Croissant mantequilla', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Briox', 3, 1);
INSERT INTO product (category, name, supplier, period) VALUES (1, 'Carrot', 3, 1);




-- table operation
DROP TABLE IF EXISTS operation;
CREATE TABLE operation
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    user_       INT                                   NOT NULL,
    timestamp   TIMESTAMP DEFAULT current_timestamp() NOT NULL ON UPDATE current_timestamp(),
    product     INT                                   NULL,
    description VARCHAR(255)                          NULL,
    CONSTRAINT operation_product_id_fk
        FOREIGN KEY (product) REFERENCES product (id)
            ON DELETE SET NULL,
    CONSTRAINT operation_user__id_fk
        FOREIGN KEY (user_) REFERENCES user_ (id)
);


