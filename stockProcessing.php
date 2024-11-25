<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="./style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Transaction Result</title>
    </head>
    <body>
        <div>
            <?php
                $amt_to_invest = 2000;
                $symbols = isset($_POST['stockSymbol']) ? $_POST['stockSymbol'] : [];
                $amounts = isset($_POST['partialAmt']) ? $_POST['partialAmt'] : [];
                $purDate = isset($_POST['purDate']) ? $_POST['purDate'] : [];
                $sellDate = isset($_POST['sellDate']) ? $_POST['sellDate'] : [];
                // This is a test to ensure the proper data is obtained from the index form submission
                // echo "<ul>";
                // foreach ($symbols as $sym) {
                //    echo "<li>" . htmlspecialchars($sym) . "</li>";
                // }
                // echo "</ul>";
                // echo "<ul>";
                // foreach ($amounts as $amt) {
                //    echo "<li>" . htmlspecialchars($amt) . "</li>";
                //}
                // echo "</ul>";
                // echo "<p>".$purDate."</p>";
                // echo "<p>".$sellDate."</p>";
                //END OF TESTING OUTPUTS
                /**
                 * TO DO:
                 * 1. Set up your mySQL with Ryan's DB
                 * 2. Connect to DB and figure out SQL to properly query for data
                 * 3. Check if the sum of the elements of $amounts is equal to $amt_to_invest, raise error if not equal
                 * 4. Query to check if $purDate and $sellDate are in the DB
                 *    a. if $purDate is a weekend date, default to soonest "open market" date
                 *    b. if $sellDate is a weekend date, default to that friday before
                 * 5. Check to make sure the purchase and sell date are at least one day apart
                 *    a. if not, raise an error message
                 * 6. Write query into DB and get results
                 * 7. Take results and factor in the 1% broker fee and 20% tax
                 * 8. Compare results with original purchasing value to calculate a loss or gain
                 * 9. Print loss or gain
                 */
            ?>
        </div>
        <form action="index.php", method="POST">
            <label for="return">Press RETURN to go back </label>
            <button type="submit">RETURN</button>
        </form>
    </body>
</html>