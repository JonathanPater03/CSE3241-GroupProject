create schema gp24TestDB;

use gp24TestDB;

Create table if not exists VALS (
    Date date not null,
    Stock varchar(5) not null,
    Price decimal(10,2) not null,
    primary key (Date, Stock)) engine=innodb;
