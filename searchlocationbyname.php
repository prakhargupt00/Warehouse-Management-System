<?php 
include_once 'includes/dbh.inc.php' ; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>search location by name</title>
</head>
<body>
	<h1>search location by name </h1>

<form action="searchlocationbyname.php" method="get">
 	<div><b>ProductName &nbsp&nbsp&nbsp</b><input type="text" name="name"/></div>
		<br>

		<input type="submit" name="submit" value="submit">
		<br>
 </form>

 <?php

if(isset($_GET["submit"])){
  	$name = $_GET["name"] ; 
  	$sql ="SELECT * FROM( productmodel NATURAL JOIN modeldetails) NATURAL JOIN location where product_name='$name' ;" ; 

  	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result) ;

	if($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<b>location_id:</b>".$row['location_id']."<br>"."<b>product_id:</b>".$row['product_id']."<br>"."<b>model_number:</b>".$row['model_number']."<br>"."<b>block:</b>".$row['block']."<br>"."<b>shelf:</b>".$row['shelf']."<br>"."<b>comapartment:</b>".$row['compartment']."<br>","<br>"."<br>" ;
		}
	}else{
		echo 'no matching type' ; 
	} 
  }

 ?>

</body>
</html>