<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
</head>
<body>


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "cafe");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM food";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo'<center>';
        echo "<table border=1 class=table table-bordered>";
        
            echo "<tr>";
            echo "<th>Image</th>";
                echo "<th>Item id</th>";
                echo "<th>Item Name</th>";
                echo "<th>Item price</th>";
    
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            ?>
            <td><img src="<?php echo $row['img_dir']; ?>" width="50px" /></td>
            <?php
                echo "<td>" . $row['item_no'] . "</td>";
                echo "<td>" . $row['item_name'] . "</td>";
                echo "<td>" . $row['item_price'] . "</td>";
            
            echo "</tr>";
        }
        echo'</center>';
        echo "</table>";
        echo'</center>';
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
</body>
</html>