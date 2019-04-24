<?php
	include_once 'includes/dbh.inc.php' ; 

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Search</title>
 </head>
 <body>
 <h1>Search By product Id </h1>

 <form action="search.php" method="get">
 	<div><b>ProductID &nbsp&nbsp&nbsp</b><input type="text" name="id"/></div>
		<br>

		<input type="submit" name="submit" value="submit">
		<br>
 </form>

 <?php

  if(isset($_GET["submit"])){
  	$id = $_GET["id"] ; 
  	$sql =" SELECT * from ( ProductModel natural join productType) natural join (ModelDetails natural join ProductDetails) where product_id=$id ;" ; 
  	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result) ;

	if($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<b>model_number:</b>".$row['model_number']."<br>"."<b>product_name:</b>".$row['product_name']."<br>"."<b>product_id:</b>".$row['product_id']."<br>"."<b>manu_id:</b>".$row['manu_id']."<br>"."<b>location_id:</b>".$row['location_id']."<br>"."<b>product_type:</b>".$row['product_type']."<br>"."<b>specification:</b>".$row['specification']."<br>"."<b>manu_date:</b>".$row['manu_date']."<br>"."<b>weight:</b>".$row['weight']."<br>"."<b>dimension:</b>".$row['dimension']."<br>"."<b>warranty:</b>".$row['warranty']."<br>" ;
		}
	}else{
		echo 'no matching type' ; 
	} 
  }

  ?>
 </body>
 </html>