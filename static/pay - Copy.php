<?php

$connect = mysqli_connect("localhost", "root", "", "cafe"); 

$query=mysqli_query($connect,"INSERT INTO where item_no='' 
SELECT food.item_no,food.item_name,food.item_price,.country 
FROM book_mast 
LEFT JOIN author
ON book_mast.aut_id=author.aut_id")or die("Failed to query database");

?>