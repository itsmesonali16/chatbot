<?php  
	$no = $_POST['no'];
	$iname= $_POST['iname'];
	$iprice= $_POST['iprice'];
	
	$con=mysqli_connect('localhost','root','','cafe');
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["img"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["sub"])) 
	{
		$check = getimagesize($_FILES["img"]["tmp_name"]);
		print_r( $check);
		if($check !== false) 
		{
			echo "File is an image - " . $check["mime"] . ".";
			$query ="insert into food set img_dir= '$target_file', item_no='$no',item_name='$iname',item_price='$iprice'";
			mysqli_query($con, $query); 
			$uploadOk = 1;
			$last_insert_id = mysqli_insert_id($con);
			if($last_insert_id) {
			echo 1;
				
				if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
					
					
					// redirect to form page.
					$query = "select img_dir from food where item_no='$last_insert_id'";
  $result = mysqli_query($con, $query);
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_object($result);
    echo "<br><br>";
    echo '<img src="'.$row->img_dir.'" width="250">';
  }

					} else {
					echo "Sorry, there was an error uploading your file.";
				}
				
				
			}
				
	} 
    else {
        echo "File is not an image.";
        $uploadOk = 0;
	}
}





?>



