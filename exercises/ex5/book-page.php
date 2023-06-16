<?php 
    include "db.php";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    // testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
    }
    // get data from DB
    $book_id = $_GET["book_id"];
    $query  = "SELECT * FROM tbl_92_books where book_id =" . $book_id;
    

    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("DB query failed.");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <title>Book page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">  
    </head>
    <body>
        <div class="container"> 
            <?php 
                $row = mysqli_fetch_assoc($result);
                echo ' 
                <div class="card my-4">
                    <div class="row">
                        <div class="col-6">
                            <img class="card-img-top m-2" src="'. $row["book_URL1"].'" alt="Card image cap">
                        </div>
                        <div class="col-6">
                            <img class="card-img-top m-2" src="'. $row["book_URL2"].'" alt="Card image cap">
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">'. $row["book_name"].'</h5>
                        <p class="card-text">'. $row["book_description"].'</p>
                        <p class="card-text">Grade: '. $row["book_grade"].'/5</p>                        
                        <p class="card-text">Cost: '. $row["book_price"].' $</p>                        
                        <h6 class="card-title">Written by: '. $row["book_author"].'</h6>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-8">
                                <small class="text-muted">Category: '. $row["book_category"].'</small>
                            </div>
                            <div class="col">
                                <a href="book-list.php" class="btn btn-outline-dark">Go back</a>
                            </div>
                        </div>
                    </div>
                </div>
             ';
            ?> 
        
        </div>
    </body>
</html>
