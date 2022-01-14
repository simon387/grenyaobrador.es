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

INSERT INTO user_ (email, name, pass, role) VALUES ('mario@almacen.com', 'Mario Correa', 'password', 1);
INSERT INTO user_ (email, name, pass, role) VALUES ('maria@almacen.com', 'Maria Portela', 'password', 2);
INSERT INTO user_ (email, name, pass, role) VALUES ('comarea@almacen.com', 'Comarea', 'password', 3);
INSERT INTO user_ (email, name, pass, role) VALUES ('andres@almacen.com', 'Andres', '603622384', 1);
INSERT INTO user_ (email, name, pass, role) VALUES ('simone.celia@simonecelia.it', 'Simone Celia', '', 4);
