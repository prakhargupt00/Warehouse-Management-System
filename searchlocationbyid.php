<?php 
include_once 'includes/dbh.inc.php' ; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>locationsearch</title>
</head>
<body>
<h1>search location by id </h1>
<form action="searchlocationbyid.php" method="get">
 	<div><b>ProductID &nbsp&nbsp&nbsp</b><input type="text" name="id"/></div>
		<br>

		<input type="submit" name="submit" value="submit">
		<br>
 </form>

 <?php

  if(isset($_GET["submit"])){
  	$id = $_GET["id"] ; 
  	$sql ="SELECT * from ProductModel natural join Location where product_id=$id ;" ; 

  	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result) ;

	if($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<b>location_id:</b>".$row['location_id']."<br>"."<b>product_id:</b>".$row['product_id']."<br>"."<b>model_number:</b>".$row['model_number']."<br>"."<b>manu_id:</b>".$row['manu_id']."<br>"."<b>block:</b>".$row['block']."<br>"."<b>shelf:</b>".$row['shelf']."<br>"."<b>comapartment:</b>".$row['compartment']."<br>" ;
		}
	}else{
		echo 'no matching type' ; 
	} 
  }

  ?>

</body>
</html>