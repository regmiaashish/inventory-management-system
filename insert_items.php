<?php
include 'menu.php';
include 'dbconnect.php';

// Initialize a variable to store the message
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $itemname = mysqli_real_escape_string($con, $_POST['itemName']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $remarks = mysqli_real_escape_string($con, $_POST['remarks']);

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO tbl_2080 (ItemName, Price, Quantity, remarks) VALUES (?, ?, 0, ?)");
    $stmt->bind_param("sds", $itemname, $price, $remarks);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "Data inserted successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Item Details</title>
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="insert-form" method="post">
            <fieldset>
                <legend>Insert Item Details</legend>
                <label for="itemName">Item Name:</label>
                <input type="text" id="itemName" name="itemName" required>

                <label for="price">Price:</label>
                <input type="number" step="0.01" id="price" name="price" required>

                <label for="remarks">Remarks:</label>
                <textarea id="remarks" name="remarks" rows="4"></textarea>

                <input type="submit" value="Add Items">
                <input type="reset" value="Clear">
            </fieldset>
        </form>
    </div>
</body>
</html>