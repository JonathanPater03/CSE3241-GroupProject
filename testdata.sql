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
