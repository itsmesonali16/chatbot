<?php
$user=$_POST['user'];
$pass=$_POST['pass'];

//connect to server
$link=mysqli_connect('localhost','root','','cafe');
//prevent sql injection
$user=trim($_POST['user']);
$pass=trim($_POST['pass']);
$user= mysqli_real_escape_string($link,$user);
$pass=mysqli_real_escape_string($link,$pass);



//Query for db
$result=mysqli_query($link,"select * from admin Where Username= '$user' and Password='$pass' ")or die("Failed to query database");
$rows=mysqli_num_rows($result);
$row =mysqli_fetch_array($result);
if($row['Username']==$user && $row['Password']==$pass){
	echo"Successful";
}
else{
	echo "Unsucessfull";
}

 if( $rows==1)
 {
 	header('Location:wecome.php');
    
 }
else{
	echo "failed";
}



?>