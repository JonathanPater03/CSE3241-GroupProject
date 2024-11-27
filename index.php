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
    <div>
        <?php
          $conn = new mysqli('127.0.0.1', 'root', 'mysql', 'gp24');
          $sql = "select distinct stock from vals;";
          $result = mysqli_query($conn, $sql);
          if (!$result) {
            die("Query for stocks failed: ".mysqli_error($conn));
          }
          else{
            echo "<h3>Available Stocks to Purchase</h3>";
            echo "<ul>";
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              echo "<li>- ".$row['stock']."</li><br>";
            }
            echo "</ul>";
          }
          mysqli_free_result($result);
          mysqli_close($conn);
        ?>
    </div>
    <form class ="formStyle" action="stockProcessing.php" method="POST">
        <div class = "totalAmount">
            <label for="totalAmt">Enter Fixed Total Amount to Invest</label>
            <input type="number" id="totalAmt" name="totalAmt" step="0.01" required>
            <br>
            <br>
        </div>
        <div class = "dynForm">
            <div class = "dynFormEntry">
                <label for="stockSymbol">Enter Stock Abbreviation Symbol</label>
                <input type="text" id="stockSymbol" name="stockSymbol[]" required>
                <br>
                <label for="partialAmt">Amount to Invest in This Stock</label>
                <input type="number" id="partialAmt" name="partialAmt[]" step="0.01" required>
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
