# CSE3241-GroupProject

#### A Web Application to Emulate Investment Results

This web application utilizes MySQL and PHP to calculate returns on investment, given a stock and dates at which the stock was bought and sold. The database is created using [GP24.sql](GP24.sql), and test data may be inserted using [testdata.sql](testdata.sql).

The database accepts data from [Investing.com](https://www.investing.com), using the following command. Other data may be input manually. 

```sql

LOAD DATA LOCAL INFILE 'DOWNLOADED CSV HERE'
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

### Setup

Download the Zip File and unzip into the directory of your choosing
```sh
tar -xf groupProj.zip
```

Log into mySQL and set local_infile=1.
```sh
mysql -u root -p --local-infile=1
```

In mySQL, run the following commands to get test data into mySQL
```sql
SOURCE GP24.sql;
SOURCE testdata.sql;
exit;
```
In the command line, ensure apachectl is working
```sh
apachectl start
```
Run the PHP project
```sh
php -S localhost:8000
```
After this, the program should load on your web browser
