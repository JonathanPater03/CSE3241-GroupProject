-- load in test data
set global local_infile=ON;
LOAD DATA LOCAL INFILE 'AAPLHistoricalData.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'AAPL';
    
LOAD DATA LOCAL INFILE 'AMZNHistoricalData.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'AMZN';
    
LOAD DATA LOCAL INFILE 'GOOGHistoricalData.csv'
into table VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	  price= @price,
	  stock = 'GOOGL';
    
LOAD DATA LOCAL INFILE 'METAHistoricalData.csv'
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
