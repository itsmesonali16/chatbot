<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cafe";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}


	if(isset($_POST["delId"])){
		$id = $_POST["delId"];
		$sq = "Delete from emp where id=".$id;
		$conn->query($sq);
		echo "Deleted";
	}
	if(isset($_POST["UpId"])){
		$id = $_POST["UpId"];
		$new = $_POST["UpPrice"];
		$sq = "Update emp set sal=".$new." where id=".$id;
		$conn->query($sq);
		echo "Update";
	}
	
?>
