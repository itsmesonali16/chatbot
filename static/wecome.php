<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Web.css">
 <header>
 <style>
  .sidebar{
    margin-left:0;
    padding-left:0;
    margin-right:85%;
    background-color:#FFFF;
    font-size: 25px; 
    height:750px;
    opacity: 2;
   
}
  div{
    box-shadow:10px 10px 5px black;

  }
  .over{
  
  width:100%;
  top:0;
  left:0;
  background-color:#2A363B ;
  z-index:1 ;
  opacity:0.7 ;
        
  }
   
   body{

    background-repeat: no-repeat;
        background-size: 100% 130%;

}



  a{
    text-decoration:none; 
    line-height: 3rem;

  }
  img{
    width: 100%;
    height: 100%;

  }  
  .box{
   margin: 50px 50px 50px 250px;
  }

button{
        background-color: #4CAF50;
        color:white;
        padding: 14px 20px;
        margin: 8px 26px;
        border: none;
        cursor:pointer;
        width:90%;
        font-size: 20px;
      } 
      .avtar{
    width:50px;
    height:50px;
    border-radius: 50px;
    top:-50px;
    left:calc(50% - 50px);

}   

</style>
</head>

<body background="beans-brew-caffeine-2059.jpg"> 
  <div class="over">
  </div>
      <div class="sidebar">
        <center>
        <img class= "avtar"src="avatar_default.png">
     <a href="additem.html"><button style="color:black;">Add Item</button></a><br>
       <a href="retrive2.php"> <button style="color:black;">Customer</button><br>
        <a href="retrive.php"><button style="color:black;">Total Stock</button><br></a>
        <a href="addemp.html"><button style=" color:black;">Employee</button></a>

      </center></div>
    
        
      
        
 </header> 
</body>
</html>