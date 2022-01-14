-- auto-generated definition
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

