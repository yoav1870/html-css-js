<?php 
    //create a mySQL DB connection:
	include "config.php";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    //testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
    //get data from DB
    $prodId = null;

    if (isset($_GET["prodId"])) { // edit ?
        $prodId = $_GET["prodId"];
        $query  = "SELECT * FROM tbl_prods where id=" . $prodId;
        $result = mysqli_query($connection, $query);

        if($result) { // edit
            $row    = mysqli_fetch_assoc($result); // there is only 1 item with id=X
            $state  = "edit";
        } else {
            $prodId = null;
            $state  = "insert";
        }
    } else {
        $state  = "insert";
    }
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
        <h1>Save Product Details</h1>
            <form action="saveProd.php">
                
                <div class="mb-3">
                    <label for="prodName1" class="form-label">Product name</label>
                    <input type="text" class="form-control" id="prodName1" name="prodName" value="<?php 
                        if (isset($row)) {
                            echo $row["name"];
                        }
                    ?>">
                </div>

                <div class="mb-3">
                    <label for="prodImg1" class="form-label">Product image</label>
                    <input type="text" class="form-control" id="prodImg1" name="prodImg" value="<?php 
                        if (isset($row)) {
                            echo $row["img_url"];
                        }
                    ?>">
                </div>

                <div class="mb-3">
                    <label for="cat" class="form-label">Category name</label>
                    <select class="form-select" id="cat" name="catId" data-selected="<?php echo $row["cat_id"];?>">
                        <option value="1">Shirts for men</option>
                        <option value="2">Shirts for women</option>
                        <option value="3">Shirts for children</option>
                    </select>
                </div>
                <input type="hidden" name="state" value="<?php echo $state;?>">
                <input type="hidden" name="prodId" value="<?php echo $prodId;?>">
                <button type="submit" class="btn btn-primary">Save</button>

            </form>
            <?php 
                //release returned data
                if(isset($result)) {
                    mysqli_free_result($result);
                }
            ?>
        </div>
    </body>

</html>

<?php
    //close DB connection
    mysqli_close($connection);
?>
