<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="./style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stock Purchasing and Selling App</title>
  </head>
  <body>
    <h1>Stock Purchasing and Selling</h1>
    <form class ="formStyle" action="stockProcessing.php" method="POST">
        <div class = "totalAmount">
            <p>You have $2000.00 to Invest</p>
        </div>
        <div class = "dynForm">
            <div class = "dynFormEntry">
                <label for="stockSymbol">Enter Stock Abbreviation Symbol</label>
                <input type="text" id="stockSymbol" name="stockSymbol[]" required>
                <br>
                <label for="partialAmt">Amount to Invest in This Stock</label>
                <input type="number" id="partialAmt" name="partialAmt[]" required>
                <button type="button" id="addStock" onclick="addStockForm()">+</button>
        
            </div>
        </div>
        <div class = "date">
            <br>
            <label for="purDate">Purchase Date</label>
            <input type="date" id="purDate" name="purDate" required>

            <label for="sellDate">Sell Date</label>
            <input type="date" id="sellDate" name="sellDate" required>
        </div>
        <br>
        <button type="submit">SUBMIT</button>
    </form>
    <script type="module" src="./dynamicForm.js"></script>
  </body>
</html>
