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
    $query = $conn->prepare("SELECT price FROM stock_prices WHERE symbol = ? AND date = ?");
    $query->bind_param("ss", $symbol, $date);
    $query->execute();
    $query->bind_result($price);
    $query->fetch();
    $query->close();
    return $price;
}
// samople command
// Calculate Gains/Losses
$results = [];
foreach ($symbols as $index => $symbol) {
    $purchasePrice = getPrice($conn, $symbol, $purDate);
    $sellPrice = getPrice($conn, $symbol, $sellDate);

    if ($purchasePrice === null || $sellPrice === null) {
        die("Error: Stock data not found for $symbol.");
    }

    $gain = (($sellPrice - $purchasePrice) * $amounts[$index] / $amt_to_invest) * 0.79; // 1% broker fee, 20% tax
    $results[] = "Stock: $symbol, Gain/Loss: $" . number_format($gain, 2);
}

// Output Results
echo "<h1>Transaction Results</h1>";
echo "<ul>";
foreach ($results as $result) {
    echo "<li>$result</li>";
}
echo "</ul>";

$conn->close();
?>
</html>