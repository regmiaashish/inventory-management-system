<?php
 include 'menu.php';
 include 'dbconnect.php';

 
     $id= $_GET['id'];
     $q = "SELECT * FROM `tbl_2080` WHERE id=$id";
     $res = mysqli_query($con, $q);
     
     $data = mysqli_fetch_array($res, MYSQLI_ASSOC);
  
 
 ?>
    <div class="right-content">
    <form  action="update.php?id=<?php echo $id; ?>" class="insert-form" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Update Item Details</legend>
                <label for="itemName">Item Name:</label>
                <input type="text" id="itemName" name="itemName" value=" <?php echo $data['item_name']; ?>">

                <label for="price">Price:</label>
                <input type="text" id="price" name="price"  value=" <?php echo $data['rate']; ?>">

                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo">

                <label for="remarks">Remarks:</label>
                <textarea id="remarks" name="remarks" rows="4" > <?php echo $data['remarks']; ?></textarea>

                <input type="submit" value="Update">
                <input type="reset" value="Clear">
                <input type="button" value="Delete">
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
