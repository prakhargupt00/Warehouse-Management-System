<?php
	include_once 'includes/dbh.inc.php' ; 

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Warehouse Management System</title>
</head>
<body>
	<div>
		<h1>Warehouse Management System </h1>
	</div>
	
	<div><a href="/simpleApp/search.php">SearchByProductId</a></div>
	<div><a href="/simpleApp/searchlocationbyid.php">Searchlocationbyid</a></div>
	<div><a href="/simpleApp/searchlocationbyname.php">Searchlocationbyname</a></div>
	<div><a href="/simpleApp/delete.php">deleteByProductId</a></div>


	<h2>Insert</h2>

	<form method="get" action="index.php">
		<div><b>ProductID &nbsp&nbsp&nbsp</b><input type="text" name="id" required="true" /></div>
		<br>	
		
		<!-- <select name="action">
			<option value="plus">+ </option>
			<option value="minus">-</option>
		</select> -->
		<div><b>Name &nbsp</b><input type="text" name="name" required="true"/></div>
		<br>
		<div><b>ModelNo &nbsp</b><input type="text" name="model" required="true"/></div>
		<br>
		<div><b>locationId &nbsp</b><input type="text" name="locid" required="true"/></div>
		<br>
		<div><b>ManufacturingId &nbsp</b><input type="text" name="manuid" required="true"/></div>
		<br>
		<div><b>Type &nbsp</b><input type="text" name="type" required="true"/></div>
		<br>
		<div><b>Specs &nbsp</b><input type="text" name="specs" required="true"/></div>
		<br>
		<div><b>Weight &nbsp</b><input type="text" name="weight" required="true"/></div>
		<br>
		<div><b>Dimension &nbsp</b><input type="text" name="dimension" required="true"/></div>
		<br>
		<div><b>Warranty &nbsp</b><input type="text" name="warranty" required="true"/></div>
		<br>
		<div><b>Manufacturing Date &nbsp</b><input type="text" name="manudate" required="true"/></div>
		<br>
		<div><b>color &nbsp</b><input type="text" name="color" required="true"/></div>
		<br>
		<br>
		
		<input type="submit" name="submit" value="submit">
		<br>
		<br>
	</form>

	<?php

		// if(isset($_GET["submit"])){
		// 		$v1 = $_GET["v1"] ; 
		// 		$v2 = $_GET["v2"] ; 

		// 		if($_GET["action"]=="plus"){
		// 			$result = $v1 + $v2 ; 
		// 			echo "$v1 + $v2" ;
		// 		}else{
		// 			$result =$v1 -$v2 ; 
		// 			echo "$v1-$v2" ; 
		// 		}
		// 		echo "= $result" ; 
		// }

	?>

<?php
	if(isset($_GET["submit"])){
    	$w  = $_GET["type"] ; 
    	$col = $_GET["color"] ;
    	$str_arr = preg_split ("/\,/", $col); 

 // product insertion 
    	$productid =$_GET["id"] ; 
    	$modelno = $_GET["model"] ; 
    	$locid = $_GET["locid"] ; 
    	$manuid = $_GET["manuid"] ; 

    	$sql = "INSERT INTO productmodel VALUES($productid,'$modelno',$manuid,$locid) ; " ;

    	if(mysqli_query($conn,$sql)){
    		echo "Records inserted successfully.";
	} else{
    		//echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}



	//producttype insertion 

	$pname = $_GET["name"] ; 
	$ptype = $_GET["type"] ; 

	$sql = "INSERT INTO producttype VALUES ('$pname','$ptype') ;" ; 
	if(mysqli_query($conn,$sql)){
    		echo "Records inserted successfully.";
	} else{
    		//echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}


	//productdetails 

	$pname = $_GET["name"] ; 
	$specs = $_GET["specs"] ; 
	$we = $_GET["weight"] ; 
	$dim = $_GET["dimension"] ; 
	$warr = $_GET["warranty"] ; 

	$sql = "INSERT INTO productdetails VALUES('$pname','$specs',$we,'$dim ','$warr') ;" ; 

	if(mysqli_query($conn,$sql)){
    		echo "Records inserted successfully.";
	} else{
    		//echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}


	    //model details 

    $manu_date = $_GET["manudate"] ;


    $sql = "INSERT INTO modeldetails VALUES('$modelno','$pname','$specs','$manu_date') ;" ; 
    if(mysqli_query($conn,$sql)){
    		echo "Records inserted successfully.";
	} else{
    		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}

		foreach ($str_arr as $value) {
    		//echo "$value <br>";
    		$sql = "INSERT INTO productcolor VALUES($productid ,'$value') ;" ; 
    		if(mysqli_query($conn,$sql)){
    		echo "Records inserted successfully.";
			} else{
		    		//echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		} 
    }


	// $sql = "SELECT * FROM  producttype where product_type ='$w' ;"  ;  
	// $result = mysqli_query($conn,$sql);
	// $resultCheck = mysqli_num_rows($result) ;

	// if($resultCheck > 0){
	// 	while($row = mysqli_fetch_assoc($result)){
	// 		echo $row['product_name']."<br>" ;
	// 	}
	// }else{
	// 	echo 'no matching type' ; 
	// } 

?>


</body>
</html>