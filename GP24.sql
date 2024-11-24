create schema gp24;

use gp24;

Create table if not exists VALS (
	  Date date not null,
    Stock varchar(5) not null,
    Price decimal(10,2) not null) engine=innodb;

-- load in test data
LOAD DATA INFILE 'AAPL Historical Data.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'AAPL';
    
LOAD DATA INFILE 'AMZN Historical Data.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'AMZN';
    
LOAD DATA INFILE 'GOOG Historical Data.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'GOOGL';
    
LOAD DATA INFILE 'META Historical Data.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'META';
