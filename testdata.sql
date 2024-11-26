-- load in test data
set global local_infile=ON;
LOAD DATA LOCAL INFILE 'AAPL Historical Data.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'AAPL';
    
LOAD DATA LOCAL INFILE 'AMZN Historical Data.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'AMZN';
    
LOAD DATA LOCAL INFILE 'GOOG Historical Data.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'GOOGL';
    
LOAD DATA LOCAL INFILE 'META Historical Data.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'META';

set global local_infile=OFF;
