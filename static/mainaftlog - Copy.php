<?php
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
             
<script src="https://kit.fontawesome.com/8256afe165.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="Web.css">
    
</head>
<style> 

  

  
.boxx2
 {
   background-color: #B9BDD7; color:rgb(23, 1, 51);
   margin: 50px 50px 50px 50px;
color:black;
   
} 


html {
  box-sizing: border-box;
}


input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the container/contact section */

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
input[type=submit] {
    width: 50%;
    margin-top:1px;
  }
}
</style>
<body>
        <header></header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <script type="text/javascript">
            
         

$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

</script>

        
        <div class="container">

        	<div id="cpanel">
               
            <ul> 
              

        <li><a href="main.html"><i class="fas fa-home"></i></a></li>  
         <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
         <li><a href="about.html"><i class="fas fa-atlas"></i></a></li>
         <li><a href="#section4" color=white><i class="far fa-id-card"></i></a></li>
            <li><a href="#section2" color=white><i class="fas fa-images"></i></a></li>
            <li><a href="logout.php" color=white><i class="fas fa-sign-out-alt"></i></a></li>
            
          
        	</div>
          <img  src='cc.jpg' width="100%" height="100%"></img>
            <div class="header-over">
            
            <b><center style="font-size:900%; color:white;">THE SPLIT BEAN</center></b>
            <div class="bt1"><a href="#section3" class="btn" style="color:white;">Menu</a></div>
           
        </div>
              
    <div class="box" class="main" id="section3">
<h1><center><b>MENU</b></center></h1>
          <h5 class="over1">Milkshakes</h5>
         	 <h5 class="over2">Pastrys</h5>
         	 <h5 class="over3">Puff-Pastry</h5>
         	 <h5 class="over4">Coffee</h5>
      
  
    	<center>
    <div class="ho" class="main" >
    <a href="menu1.php"> <left><img src='mm.jpg' width="30%" height="45%"></img></left></a>
    	 <a href="menu2.php"> <left><img src='pp.jpg' width="30%" height="30%"></img></left></a>
    	  <a href="menu3.php"> <left><img src='images.jpg' width="30%" height="25%"></img></left></a>
    	  <a href="menu4.php"> <left> <img src='ru.jpg' width="30%" height="30%"></img></left></a>
          
    	</center>
    </div>
    	</div>
        <div class="box2" class="main" id='section2'> 
  
        <h1><b><center>PHOTOS</center></b><center><h1>
            <left> <img class="ss" src='inside4.jpg'></img></left>
         <left><img src='pics/8275_Recept_cappuchino_met_cacaopoeder_336x264.jpg'></img></left>
         <left><img src='pics/cinnamon-orange-rolls-ck.jpg'></img></left><left><img src='pics/85C-Bakery_Cakes_StrawberryTiramisu_FullMonth_01.jpg'></img></left>
          <left> <img src='inside2.jpg'></img></left>
          <left> <img src='w2.jpg'></img></left>
          <left> <img src='inside3.jpg'></img></left>
          <left> <img src='w1.jpg'></img></left>
          <left> <img src='inside1.jpg'></img></left>
         
          
          

        </center></div></div>
        <div class="boxx2" class="main" id="section4" >


<h1><center><b>Contact</b></center></h1>
<div>
    <p style="font-size: 18px;text-align: center;">Swing by for a cup of coffee, or leave us a message:</p>
  </div>
  <div class="row">
    <div class="column">
      <img src="rrr.jpg" style="width:100%">
    </div>
    <div class="column">
      <form action="/action_page.php">
        <label for="fname">Email<label>
        <input type="text" id="fname" name="firstname" placeholder="Your email">
        
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
    </div>
<?php
include("index1.html");
?>
<div>
<footer><center style="color:black;">&copy;Copyright 2010 The Split Bean</footer></div>
</body>

</html>