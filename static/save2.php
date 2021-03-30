<?php  
	$eno = $_POST['eno'];
	$ename= $_POST['ename'];
	$dept= $_POST['dept'];
	$phoneno=$_POST['phoneno'];
	$address=$_POST['address'];
	$qli=$_POST['qli'];
	$sal=$_POST['sal'];
	
	$con=mysqli_connect('localhost','root','','cafe');
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["sub"])) 
	{
		
		$query ="insert into emp set eno= '$eno', ename='$ename',Qli='$qli',Dept='$dept',phoneno='$phoneno',Address='$address',sal='$sal'";
			mysqli_query($con, $query); 
		echo("Query executed");
			
				
				
}
else
{
  if(isset($_POST["ed"]))
  {
  	header('Location:retrive1.php');
  }
}
				
	 
    ?>



