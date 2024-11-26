# CSE3241-GroupProject

#### A Web Application to Emulate Investment Results

This web application utilizes MySQL and PHP to calculate returns on investment, given a stock and dates at which the stock was bought and sold. The database is created using [GP24.sql](GP24.sql), and test data may be inserted using [testdata.sql](testdata.sql).

For testdata.sql, ensure the file name in the single quotes '' is the complete file path of the csv files you would like to use. This can be done by right-clicking the csv file and copying the complete path of the file, and then pasting that path inside the quotations after 'INFILE'.

The database accepts data from [Investing.com](https://www.investing.com), using the following command. Other data may be input manually. 

```sql

LOAD DATA INFILE 'DOWNLOADED CSV HERE'
INTO TABLE VALS
FIELDS terminated by ','
ENCLOSED by '"'
LINES terminated by '\n'
IGNORE 1 LINES
(@date,@price, @open, @high, @low, @vol, @change)
SET date = STR_TO_DATE(@date, '%m/%d/%Y'),
	price= @price,
	stock = 'STOCK SYMBOL HERE';

```
