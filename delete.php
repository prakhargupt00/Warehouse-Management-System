<?php 
include_once 'includes/dbh.inc.php' ; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete By productId</title>
</head>
<body>
	<h1>delete by Id </h1>
	<form action="delete.php" method="get">
 	<div><b>ProductID &nbsp&nbsp&nbsp</b><input type="text" name="id"/></div>
		<br>

		<input type="submit" name="submit" value="submit">
		<br>
 </form>
  <?php
  if(isset($_GET["submit"])){
  	$id = $_GET["id"] ; 
  	$sql =" DELETE from modeldetails where model_number=(select model_number from productmodel where product_id=$id);" ; 

  	if(mysqli_query($conn,$sql)){
    		echo "Records DELETED successfully.";
	} else{
    		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}

  	$sql = "DELETE from productmodel where product_id=$id ;" ;

  	if(mysqli_query($conn,$sql)){
    		echo "Records DELETED successfully.";
	} else{
    		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}

  }

  ?>
</body>
</html>