<?php
$nm=$_POST['name'];
$no=$_POST['no'];
$pass=$_POST['pass'];
$em=$_POST['em'];


//connect to server
$link=mysqli_connect('localhost','root','','cafe');
//prevent sql injection
$nm=trim($_POST['name']);
$pass=trim($_POST['pass']);
$no=trim($_POST['no']);
$em=trim($_POST['em']);
$em= mysqli_real_escape_string($link,$em);
$pass=mysqli_real_escape_string($link,$pass);
$no= mysqli_real_escape_string($link,$no);
$nm=mysqli_real_escape_string($link,$nm);



//Query for db
$result=mysqli_query($link,"insert into login set c_nm= '$nm',c_pass='$pass',c_email='$em', c_phone='$no'")or die("Failed to query database");
echo'<script>alert("Signup Successsful")</script>';
echo '<script>window.location="signin.html"</script>'; 
?>