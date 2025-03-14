<?php
include "menu.php";
include "dbconnect.php";

$q = "SELECT * FROM purchases";
$result = mysqli_query($con, $q);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Purchases</title>
    <style>
        .right-content {
            margin: 20px;
        }
        fieldset {
            border: 1px solid #ccc;
            padding: 20px;
        }
        legend {
            font-size: 1.2em;
            font-weight: bold;
        }
        .display-purchase-table {
            width: 100%;
            border-collapse: collapse;
        }
        .display-purchase-table th, .display-purchase-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .display-purchase-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="right-content">
        <fieldset>
            <legend>Display Purchase</legend>
            <table border="1" cellspacing="0" cellpadding="2" class="display-purchase-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Vendor</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['vendor'] . "</td>";
                        echo "<td>$" . $row['price'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>" . $row['remarks'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </fieldset>
    </div>
</body>
</html>

<?php
mysqli_close($con);
?>