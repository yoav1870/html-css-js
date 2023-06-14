<?php 
    //create a mySQL DB connection:
	include "config.php";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    //testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
?>
<?php 
	//get data from querystring and escape variables for security
	$prodName 	= mysqli_real_escape_string($connection, $_GET['prodName']);
	$prodImg  	= mysqli_real_escape_string($connection, $_GET['prodImg']);
	$catId    	= mysqli_real_escape_string($connection, $_GET['catId']);
	$state    	= $_GET['state'];
	$prodId    	= $_GET['prodId'];
	
	//SET: insert/update data in DB
	if ($state == "insert") {
		$query = "insert into tbl_prods(name,img_url,cat_id) values ('$prodName','$prodImg','$catId')";
		// echo $query;
	}
	else {
		$query = "update tbl_prods set name='$prodName', img_url='$prodImg', cat_id='$catId' where id='$prodId'";
		// echo $query;
	}
	$result = mysqli_query($connection, $query);
	
    if(!$result) {
        die("DB query failed.");
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">  
		<title>msg to user</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<!-- <link href="includes/style.css" rel="stylesheet"> -->
	</head>
	<body>
	    <div class="container">
			<h1>Save Product Details</h1>
			<h2>product was saved</h2>
			<a href="products_list.php">click to see all products</a>
	    </div>
	</body>
</html>
<?php
    //close DB connection
    mysqli_close($connection);
?>
