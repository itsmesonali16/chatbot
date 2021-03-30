<?php
	
session_start();
	
$uid =$_SESSION["loggedin"];
echo $uid;
#$cart = $_SESSION['cart'];
  $conn=mysqli_connect("localhost", "root", "", "cafe");
if(isset($_POST)){

		
		$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
		$zip = filter_var($_POST['zip'], FILTER_SANITIZE_NUMBER_INT);
         
      
		
		if($uid !=""){
			//update data in usersmeta table

$rand=mt_rand(100000000,999999999);
				$total = 0;
			//print_r($_SESSION["shopping_cart"] );
				foreach($_SESSION["shopping_cart"] as $keys) {
					
					$id=$keys['item_id'];
					$price=$keys['item_pri'];
					$qty=$keys['item_qty'];
				 $iosql = "INSERT INTO `order`(`item_no`, `item_price`, `item_qty`, `c_id`, `orderstatus`,`order_id`) VALUES ('$id','$price','$qty','$uid','order comfirmed','$rand')";
				
				$iores = mysqli_query($conn, $iosql) or die(mysqli_error($conn));
				
				}
				

$sql="INSERT INTO `details`( `firstname`, `address`, `city`, `state`, `zip`, `c_id`) VALUES ('$firstname','$address','$city','$state','$zip','$uid')";
                $io = mysqli_query($conn,$sql) or die(mysqli_error($conn));






				
				echo '<script>alert("Order Placed")</script>';  
                echo '<script>window.location="mainaftlog.php"<script>';
		unset($_SESSION['shopping_cart']);
}
else{
	echo "INVALID";
}}
?>

					
					
				
	
