<?php
$user=$_POST['em'];
$pass=$_POST['pass'];

//connect to server
$link=mysqli_connect('localhost','root','','cafe');
//prevent sql injection




//Query for db
$result=mysqli_query($link,"select * from login Where c_email= '$user' and c_pass='$pass' ")or die("Failed to query database");
$rows=mysqli_num_rows($result);
$row =mysqli_fetch_array($result);
if($row['c_email']==$user && $row['c_pass']==$pass){
	
	echo"Successful";
	


}
else{
	echo "Unsucessfull";
}

 if( $rows==1)
 {
 session_start();
    
    $_SESSION['loggedin'] =$row['c_id']; // $username coming from the form, such as $_POST['username']
                                       // something like this is optional, of course

 	header('Location:mainaftlog.php');	
}
else{
	echo "failed";
}



?>