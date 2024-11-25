create schema gp24;

use gp24;

Create table if not exists VALS (
    Date date not null,
    Stock varchar(5) not null,
    Price decimal(10,2) not null,
    primary key (Date, Stock)) engine=innodb;
