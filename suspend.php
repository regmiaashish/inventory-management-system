<?php
include"menu.php";
include 'dbconnect.php';
// Check if 'id' key exists in the $_GET array
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "UPDATE `signup` SET `Status`='suspend' WHERE user_id='$id' ";
    $result = mysqli_query($con, $query);

    echo "<div class='right-content'>User Suspended Successfully</div>";
} else {
    echo "User ID not provided.";
}
?>