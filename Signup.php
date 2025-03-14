<?php
include 'menu.php';
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Please enter a valid email address.";
        exit;
    }

    // Hash the password
    $password_hash = password_hash($pass, PASSWORD_BCRYPT);

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO signup (username, email, password_hash, status) VALUES (?, ?, ?, 'pending')");
    $stmt->bind_param("sss", $name, $email, $password_hash);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
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
    <title>Signup Page</title>
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
        .insert-form label, .insert-form input {
            margin: 5px 0;
        }
        .insert-form input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .insert-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="right-content">
        <fieldset>
            <legend>Signup User</legend>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="insert-form" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <input type="submit" value="Submit">
            </form>
        </fieldset>
    </div>
</body>
</html>