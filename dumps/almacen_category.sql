create table category
(
    id   int auto_increment,
    name varchar(255) not null,
    constraint category_id_uindex
        unique (id)
);

alter table category
    add primary key (id);

INSERT INTO almacen.category (name) VALUES ('sin categoría');