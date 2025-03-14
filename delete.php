<?php

// Check if 'id' key is set in the $_GET array
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = intval($_GET['id']);

    // Check if the ID is a valid positive integer
    if ($id > 0) {
        // Include database connection and menu files
        include "dbconnect.php";
        include "menu.php";

        // Use a prepared statement to delete data
        $query = "DELETE FROM `tbl_2080` WHERE id = ?";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            // Bind the parameter
            mysqli_stmt_bind_param($stmt, "i", $id);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Check if any rows were affected
            if (mysqli_stmt_affected_rows($stmt) > 0) {

              echo '
               <div class="right-content">
              <div class="content">';
                echo "Data deleted Successfully";
                echo '</div></div>';

            } else {
                echo "No matching record found for deletion";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        }

        // Close the database connection
        mysqli_close($con);
    } else {
        echo "Invalid ID";
    }
} else {
    echo "ID not set in the URL";
}

?>

 