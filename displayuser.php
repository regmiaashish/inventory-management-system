<?php
 include "menu.php";  
 include "dbconnect.php";
$q="select user_id,username,Status from signup";
$result= mysqli_query($con,$q);

?>

    <div class="right-content">
       
            
    <table border="1px solid" cellpadding="2"cellspacing="0" class="display-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th >Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <?php
while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
$id=$row[0];
echo "<tr>";
foreach($row as $v){
echo "<td> $v </td>";
}

 echo "<td >
 <a href='activate.php?id=$id' onclick='return confirm(\"Are you sure want to Activate?\")'>Activate</a>
 <a href='suspend.php?id=$id' onclick='return confirm(\"Are you sure want to Suspend?\")'>Suspend</a>
</td>";

}
      ?>
      </table>
    
    </div>
</div>
</body>
</html>
