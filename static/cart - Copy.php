 <?php   
 session_start();
 if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]!="") 
 {
$connect = mysqli_connect("localhost", "root", "", "cafe");

 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
     $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_POST["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'=>     $_REQUEST["id"],  //chnages
                     'item_na'=>     $_POST["hidden_name"],  
                     'item_pri'=>     $_POST["hidden_price"],  
                     'item_qty'=>     $_POST["quantity"]);  
                $_SESSION["shopping_cart"][$count] = $item_array;  
              
          
        }
           else  
         {  
               echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
          }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'=>     $_REQUEST["id"],  
                'item_na'=>     $_POST["hidden_name"],  
                'item_pri'=>     $_POST["hidden_price"],  
                'item_qty'=>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_REQUEST["action"]))  
 {  
      if($_REQUEST["action"] =="delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_REQUEST["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Shopping Cart</title>  
          <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      </head>  
      <body>  
           
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
						   
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                            foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                        
                          <tr style="text-align: center;"> <!--------------------new changes----------> 
                               <td><?php echo $values["item_na"]; ?></td>  
                               <td><?php echo $values["item_qty"]; ?></td>  
                               <td>₹ <?php echo $values["item_pri"]; ?></td>  
                            <td>₹ <?php echo number_format($values["item_qty"] * $values["item_pri"], 2); ?></td> 
                             <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>">Remove</a></td>  
                          </tr>  
                          <?php  
                               $total = $total + ($values["item_qty"] *$values["item_pri"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">₹ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
						  <tr></tr> <!--------------------new changes----------> 
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
		   <a href="mainaftlog.php"><i class="fas fa-arrow-circle-left"></i></a>
       <a href="index2.php" style="float:right;text-decoration:none; color:white;"><button style="background-color:green;">PAYMENT</button></a> <?php
       
} 
else {
     echo '<script>alert("Login Please")</script>';  
                     echo '<script>window.location="main.html"</script>';  
                
}?>
           <br />  
      </body>  
 </html>
