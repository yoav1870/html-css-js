<?php 
    include "db.php";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    // testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
    }


     // get all data from DB
     $query  = "SELECT * FROM tbl_92_books";
     $result = mysqli_query($connection, $query);
 
     if(!$result) {
         die("DB query failed.");
     }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book-list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">   
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h1>Welcome to my recommended books list</h1>
            </div>
            <div class="col-2 mt-1">
                <select name="select" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
            <?php
                while($row = mysqli_fetch_assoc($result)) {
                echo '
                    
                        <div class="card my-4">
                            <img class="card-img-top m-2" src="'. $row["book_URL1"].'" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">'. $row["book_name"].'</h5>
                                <p class="card-text">'. $row["book_description"].'</p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-8">
                                        <small class="text-muted">'.$row["book_category"].'</small>
                                    </div>
                                    <div class="col">
                                        <a href="book-page.php?book_id=' . $row["book_id"] . '" class="btn btn-outline-dark">See book page</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                     ';
                }
                ?>
            </div>
        </div> 
    </div>
    <script src="js/listjs.js"></script>
</body>
</html>


