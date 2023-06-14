<?php 
	include "config.php"; 
	session_start(); 

	// check if the user tring to get from url.
	if(!isset($_SESSION["user_id"])){
		header('Location: ' . URL . 'index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">  
	    <title>posts..</title>
	    <link href="includes/style.css" rel="stylesheet">
	</head>
	<body>
	    <div>
			login success!!
			here you can add IF in php: if login was by user type A show X, if login was by user type B show Y
			<?php 
			echo 'session is: ' . $_SESSION["user_type"];
			echo "<section>";
	        if($_SESSION["user_type"] == "admin") {
	               echo "<a href='edit.php' class='edit-icon'>edit</a>";
	           }
            echo "</section>";	        
			?>
	    </div>
	</body>
</html>