<?php
 session_start();
if(!isset($_SESSION['username'])){
    header("location:loginform.php");
 }

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

        nav a ,a {
            text-decoration: none;
            color: #333;
            padding: 8px;
            margin: 0 10px;
            border-radius: 4px;
            background-color: #eee;
            transition: background-color 0.3s ease-in-out;
        }

        nav a:hover{
        background-color:red; }

        a:hover {
            background-color: purple;
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
            transition: background-color 0.2s ease-in-out;
        }

        .left-sidebar a:hover {
            background-color: purple;
        }

        .right-content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
            overflow: scroll;
            text-align: center;
    
         justify-content: center;
             
        }

        .insert-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width:500px;

            justify-content:center;
            text-align:center;
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

        input[type="reset"], input[type="delete"] {
            background-color: #f44336;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="reset"]:hover, input[type="delete"]:hover {
            background-color: #d32f2f;
        }


        .display-table {
            width: 70%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .display-table th, .display-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .display-table th {
            background-color: #f2f2f2;
        }

        .delete-button {
            display: flex;
            justify-content: center;
            text-decoration:none;
        }
        .delete-button a {
            margin: 0 5px;
            padding: 8px;
            cursor: pointer;
        }

        .delete-button .delete-button {
            background-color: #f44336;
            color: #fff;
        }

        .delete-button .edit-button {
            background-color: #4caf50;
            color: #fff;
        }
        .right-content{
            overflow: scroll;
        }

        table {
            width:100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        table th {
            background-color: #f2f2f2;
        }
        
        }
        .content{
          font-family: sans-serif;
          font-size: 20px;
          font-weight: bold;
          color: darkgreen;

        }
        .display-table {
            width:100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .display-table th, .display-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .display-table th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
}

        .display-purchase-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .display-purchase-table th, .display-purchase-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .display-purchase-table th {
            background-color: #f2f2f2;
        }

        .stock-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .stock-table th, .stock-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .stock-table th {
            background-color: #f2f2f2;
        }

        legend{
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }
    </style>
</head>
<body>

<header>
   
</header>

<nav>
    <div class="logout">
         <h1>Inventory System</h1>
        <span>Welcome:<?php echo $_SESSION['username'];  ?></span>
         
        <span><a href="logout.php" onclick='return confirm("Are you sure want to logout?")'>Logout</a></span>
        
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
            <li><a href="sale.php">Sale</a></li>
            <li><a href="display_purchase.php">Display Purchase Data</a></li>
            <li><a href="stock.php">Stock</a></li>
        </ul> </div>
    