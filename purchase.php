<?php
include "menu.php";
include "dbconnect.php";

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = date("Y-m-d"); // Current date
    $item_name = mysqli_real_escape_string($con, $_POST['itemName']);
    $vendor = mysqli_real_escape_string($con, $_POST['vendor']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $remarks = mysqli_real_escape_string($con, $_POST['remarks']);

    $query = "INSERT INTO purchases (date, item_name, vendor, price, quantity, remarks) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("sssdii", $date, $item_name, $vendor, $price, $quantity, $remarks);

    if ($stmt->execute()) {
        $message = "Purchase recorded successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Item</title>
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
        .insert-form {
            display: flex;
            flex-direction: column;
        }
        .insert-form label, .insert-form input, .insert-form textarea {
            margin: 5px 0;
        }
        .insert-form input[type="submit"], .insert-form input[type="reset"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .insert-form input[type="submit"]:hover, .insert-form input[type="reset"]:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="right-content">
        <?php if (!empty($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <form class="insert-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <legend>Purchase Item</legend>
                <label>Item Name:</label>
                <input type="text" name="itemName" required>

                <label>Vendor:</label>
                <input type="text" name="vendor" required>

                <label>Price:</label>
                <input type="number" step="0.01" name="price" required>

                <label>Quantity:</label>
                <input type="number" name="quantity" required>

                <label>Remarks:</label>
                <textarea name="remarks" rows="4"></textarea>

                <input type="submit" value="Add Purchase">
            </fieldset>
        </form>
    </div>
</body>
</html>