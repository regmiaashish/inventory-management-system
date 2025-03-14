<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }


        nav {
            display: flex;
            justify-content: space-between;
            background-color: purple;
            padding: 10px;
             color: #fff;
        }

        nav a {
            text-decoration: none;
            color: #333;
            padding: 8px;
            margin: 0 10px;
            border-radius: 4px;
            background-color: #eee;
            transition: background-color 0.3s ease-in-out;
        }

        nav a:hover {
            background-color: red;
        }

        .container {
            display: flex;
            height: 80vh;
        }

        .left-sidebar {
            width: 20%;
            background-color: #f4f4f4;
            padding: 20px;
            box-sizing: border-box;
        }

        .left-sidebar h2 {
            margin-bottom: 15px;
        }

        .left-sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .left-sidebar li {
            margin-bottom: 10px;
        }

        .left-sidebar a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 8px;
            border-radius: 4px;
            background-color: #eee;
            transition: background-color 0.3s ease-in-out;
        }

        .left-sidebar a:hover {
            background-color: red;
        }

        .right-content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
        }

        legend {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"], input[type="button"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #45a049;
        }

        input[type="reset"] {
            background-color: #f44336;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="reset"]:hover {
            background-color: #d32f2f;
        }

    </style>
</head>
<body>

<header>
   
</header>

<nav>
    <div>
         <h1>Inventory System</h1>
        <span>Welcome Admin</span>
        <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span><a href="#">Logout</a></span>
        
    </div>
</nav>

<div class="container">
    <div class="left-sidebar">
        <ul>
            <li><a href="insert_items.php">Insert Items</a></li>
            <li><a href="dispalay.php">Display Items</a></li>
            <li><a href="Signup.php">Sign Up Users</a></li>
            <li><a href="displayuser.php">Display Users</a></li>
            <li><a href="purchase.php">Purchase</a></li>
            <li><a href="#">Sale</a></li>
            <li><a href="display_purchase.php">Display Purchase Data</a></li>
            <li><a href="stock.php">Stock</a></li>
        </ul>
    </div>

    <div class="right-content">

    <form class="purchase-form" action="purchase_process.php" method="post">
            <fieldset>
                <legend>Sale Items</legend>
                <label for="itemName">Item:</label>
                <select id="itemName" name="itemName" required>
                    <option value="Select">select</option>
                    <option value="Television">Television</option>
                    <option value="Laptop">Laptop</option>
                    
                </select>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>

                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required>

                <label for="vendor">Vendor:</label>
                <input type="text" id="vendor" name="vendor" required>

                <label for="remarks">Remarks:</label>
                <textarea id="remarks" name="remarks" rows="4"></textarea>

                <input type="submit" value="Sale">
                <input type="reset" value="Clear">

            </fieldset>
        </form>



    </div>
</div>
</body>
</html>
