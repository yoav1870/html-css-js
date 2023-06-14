<?php 
    include "config.php";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    // testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
    }
?>

<?php 
    // get all data from DB
    $query  = "SELECT * FROM tbl_prods order by name";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        die("DB query failed.");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title>form for new or update</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Products</h1>
            <?php 
                echo '<div class="row">';
                while($row = mysqli_fetch_assoc($result)) { //results are in associative array. keys are cols names
                    $img = $row["img_url"];
                    if(!$img) $img = "images/default.jpg";
                    //output data from each row
                    echo '<div class="col-sm-6">';
                    echo    '<div class="card">';
                    echo        '<img src="' . $img . '" class="card-img-top">';
                    echo        '<div class="card-body">';
                    echo        '<h5 class="card-title">' . $row["name"] . '</h5>';
                    echo        '<a href="prod_page.php?prodId=' . $row["id"] . '" class="btn btn-primary">See product page</a>';
                    echo '</div></div></div>';
                }
                echo '</div>';
            ?> 
        </div>
    </body>
</html>

<?php
    //close DB connection
    mysqli_close($connection);
?>



