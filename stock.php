<?php
include "menu.php";
include "dbconnect.php";

// Fetch stock data from the database
$q = "SELECT * FROM stock";
$result = mysqli_query($con, $q);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>

<div class="right-content">
    <fieldset>
        <legend>Stock</legend>
        <table class="stock-table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </fieldset>
</div>

<?php
mysqli_close($con);
?>