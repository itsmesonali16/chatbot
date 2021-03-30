<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
</head>
<style type="text/css">
    .sub{
            background-color: #4CAF50;
            color:white;
            padding: 14px 20px;
            margin: 8px 26px;
            border: none;
            cursor:pointer;
            width:10%;
            font-size:15px;
        }
</style>
<body>
<?php

$link = mysqli_connect("localhost", "root", "", "cafe");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM login";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo'<center>';
        echo "<table border=1 class=table table-bordered>";
        
            echo "<tr>";
           
                echo "<th>C-ID</th>";
                echo "<th>Customer Name</th>";
                echo "<th>Email</th>";
                 echo "<th>Phone Number</th>";
                  
    
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
        
                echo "<td>" . $row['c_id'] . "</td>";
                echo "<td>" . $row['c_nm'] . "</td>";
                echo "<td>" . $row['c_email'] . "</td>";
                echo "<td>" . $row['c_phone'] . "</td>";
                
            
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
} 
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>


</body>
</html>