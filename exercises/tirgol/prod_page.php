<?php 
    //create a mySQL DB connection:
    include "config.php";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    //testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
    }
?>

<?php 
    // get data from DB
    $prodId = $_GET["prodId"];
    $query  = "SELECT * FROM tbl_prods where id=" . $prodId;
    // echo $query;

    $result = mysqli_query($connection, $query);
    if($result) {
        $row = mysqli_fetch_assoc($result); //there is only 1 item with id=X
    }
    else die("DB query failed.");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title>form for new or update</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container"> 
            <?php 
            echo '<h3>Category ' . $row["cat_id"] .'</h3>';
            echo '<h1>' . $row["name"] .'</h1>';
            $img = $row["img_url"];
            if(!$img) $img = "images/default.jpg";
            echo '<img src="' . $img . '">';
            ?> 
        
            <?php 
                //release returned data
                mysqli_free_result($result);
            ?>
        </div>
    </body>
</html>

<?php
    //close DB connection
    mysqli_close($connection);
?>
