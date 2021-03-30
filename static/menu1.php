<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="Web.css">
</head>
<style>
.card {
  box-shadow: 0 4px 8px 0 black;
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  z-index: 1;
  opacity: 5;
}

.price {
  color: grey;
  font-size: 22px;
  text-align:center;
}

.card{
background-image: url(pngtree-restaurant-set-menu-background-material-image_158473.jpg);
}
.box3{
  background-image: url(background1_2.jpg);

 
}
.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
opacity: 0.7;
}

h1{
	color:white;
	font-size:50px;
}
</style>

<body>
        <header></header>     
        <div class="container">
          <h1 color="white">Milkshake</h1>     
          
         </div>
            
    
    <div class="box3" >
<?php
session_start();  
 $link = mysqli_connect("localhost", "root", "", "cafe");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "SELECT item_no,item_name,img_dir,item_price FROM food where item_no BETWEEN 1001 AND 1018 ";
if($result = mysqli_query($link, $sql))
{
    if(mysqli_num_rows($result)>0){
        
        
        while($row = mysqli_fetch_array($result))
        {
            
            echo'<br>';
            ?>         
 <div class="card">
<form method="post"action="cart.php">  <!--------------------new changes---------->
<img src="<?php echo $row['img_dir']; ?>" width="250" />
<h3><?php echo $row['item_name']; ?></h3>
<p class="price"><?php echo $row['item_price']; ?></p>
<input type="number" placeholder="Qty" name="quantity" value="1">

 
<input type="hidden" name="hidden_name" value="<?php echo $row['item_name'];?>">
<input type="hidden" name="hidden_price" value="<?php echo $row['item_price']; ?>">
<input type="hidden" name="id" value="<?php echo $row['item_no']; ?>">    <!--------------------new changes---------->
<input type="hidden" name="action" value="add">     <!--------------------new changes---------->
<p><button type='submit' name="add_to_cart" value="Add to Cart">Add to Cart</button></p>
</form>
</div>
<br>
                
<?php                
               
           
        }
        
        // Free result set
       
    } 
    else{
        echo "No records matching your query were found.";
    }
} 
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection


?>

</div>

</body>
</html>
