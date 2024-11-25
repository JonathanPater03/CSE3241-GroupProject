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
                // test comment number 2
                echo "<ul>";
                foreach ($symbols as $sym) {
                    echo "<li>" . htmlspecialchars($sym) . "</li>";
                }
                echo "</ul>";
                echo "<ul>";
                foreach ($amounts as $amt) {
                    echo "<li>" . htmlspecialchars($amt) . "</li>";
                }
                echo "</ul>";
                echo "<p>".$purDate."</p>";
                echo "<p>".$sellDate."</p>";
                //END OF TESTING OUTPUTS
            ?>
        </div>
        <form action="index.php", method="POST">
            <label for="return">Press RETURN to go back </label>
            <button type="submit">RETURN</button>
        </form>
    </body>
</html>