create table role_
(
    id   int auto_increment
        primary key,
    name varchar(255) not null,
    constraint role__name_uindex unique (name)
);

INSERT INTO almacen.role_ (name, id) VALUES ('admin', 1);
INSERT INTO almacen.role_ (name, id) VALUES ('placa', 2);
INSERT INTO almacen.role_ (name, id) VALUES ('comarea', 3);
INSERT INTO almacen.role_ (name, id) VALUES ('super-admin', 4);
