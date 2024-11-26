<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="./style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Transaction Receipt</title>
    </head>
    <body>
        <div>
            <?php
                $conn = new mysqli('127.0.0.1', 'root', 'mysql', 'gp24');
                $amt_to_invest = $_POST['totalAmt'];
                $symbols = isset($_POST['stockSymbol']) ? $_POST['stockSymbol'] : [];
                $amounts = isset($_POST['partialAmt']) ? $_POST['partialAmt'] : [];
                $purDate = $_POST['purDate'];
                $sellDate = $_POST['sellDate'];
                // Validate Total Investment
                if (array_sum($amounts) != $amt_to_invest) {
                    die("Error: Total amounts do not match the amount to invest.");
                }

                // Adjust Dates for Weekends
                function adjustToWeekday($date) {
                    $day = date('N', strtotime($date));
                    if ($day >= 6) {
                        return date('Y-m-d', strtotime('last Friday', strtotime($date)));
                    }
                    return $date;
                }
                $purDate = adjustToWeekday($purDate);
                $sellDate = adjustToWeekday($sellDate);

                // Validate Dates
                if ($sellDate <= $purDate) {
                    die("Error: Sell date must be after purchase date.");
                }

                // Fetch Stock Price
                function getPrice($conn, $symbol, $date) {
                    $query = $conn->prepare("SELECT Price FROM VALS WHERE Stock = ? AND Date = ?");
                    $query->bind_param("ss", $symbol, $date);
                    $query->execute();
                    $query->bind_result($price);
                    $query->fetch();
                    $query->close();
                    return $price;
                }
                // Calculate Gains/Losses
                $results = [];
                echo "<h1>Transaction Information</h1>";
                echo "<table>
                    <tr>
                        <th>Stock Symbol</th>
                        <th>Purchase Date</th>
                        <th>Purchase Price</th>
                        <th>Sell Date</th>
                        <th>Sell Price</th>
                    </tr>";
                foreach ($symbols as $index => $symbol) {
                    $purchasePrice = getPrice($conn, $symbol, $purDate);
                    $sellPrice = getPrice($conn, $symbol, $sellDate);
                    echo "<tr>
                            <td>$symbol</td>
                            <td>$purDate</td>
                            <td>$purchasePrice</td>
                            <td>$sellDate</td>
                            <td>$sellPrice</td>
                        </tr>";
                    if ($purchasePrice === null || $sellPrice === null) {
                        die("Error: Stock data not found for $symbol.");
                    }

                    $gain = (($sellPrice - $purchasePrice) * $amounts[$index] / $amt_to_invest) * 0.99; // 1% broker fee
                    $gain = $gain * 0.80; //20% tax
                    $results[] = "Stock: $symbol, Gain/Loss: $" . number_format($gain, 2);
                }
                echo "</table>";

                // Output Results
                echo "<h1>Transaction Results</h1>";
                echo "<table>
                    <tr>
                        <th>Result</th>
                    </tr>";
                foreach ($results as $result) {
                    echo "<tr><td>$result</td></tr>";
                }
                echo "</table>";

                $conn->close();
            ?>
        </div>
        <form class="returnButton" action="index.php", method="POST">
            <button type="submit">RETURN</button>
        </form>
    </body>
</html>