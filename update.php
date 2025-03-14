<?php
include "menu.php";
include "dbconnect.php";

// Check if the form was submitted
 
    // Assuming you have a database connection ($con) established

    // Handle photo upload
   
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK){
        $photo = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "images/".$photo);
    }

    // Assuming you have form inputs like $itemname, $price, $remarks
    $itemname = mysqli_real_escape_string($con, $_POST['itemName']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $remarks = mysqli_real_escape_string($con, $_POST['remarks']);
    
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // Use prepared statement to prevent SQL injection
    $query = "UPDATE `tbl_2080` SET `item_name`=?, `rate`=?, `remarks`=?, `photo`=? WHERE id=?";
    
    $stmt = mysqli_prepare($con, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssi", $itemname, $price, $remarks, $photo, $id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if($result){
        echo "Update successful";
    } else {
        echo "Update failed: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
?>

</div>
</div>
</body>
</html>