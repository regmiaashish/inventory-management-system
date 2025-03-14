<?php
include 'menu.php';
include 'dbconnect.php';

// SQL query to select data from tbl_2080
$q = "SELECT id, ItemName, Price, remarks FROM tbl_2080";
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
    <title>Display Records</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .delete-button, .update-button {
            padding: 5px 10px;
            margin: 5px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            border: none;
            cursor: pointer;
        }
        .delete-button:hover, .update-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="right-content">
        <fieldset>
            <legend>Display</legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Remarks</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $itemName = $row['ItemName'];
                        $rate = $row['Price'];
                        $remarks = $row['remarks'];

                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$itemName</td>";
                        echo "<td>$rate</td>";
                        echo "<td>$remarks</td>";
                        echo "<td>
                                <a href='delete.php?id=$id' class='delete-button' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>
                              </td>";
                        echo "<td>
                                <a href='edit.php?id=$id' class='update-button'>Update</a>
                              </td>";
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