create table period
(
    id     int auto_increment
        primary key,
    start  timestamp        null,
    end    timestamp        null,
    actual bit default b'1' not null
);

INSERT INTO period (start, end, actual) VALUES ('2020-12-19 21:43:56', null, true);