<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
</head>
<body>
  <?php 
    $colors = array("blue", "red", "green");
    $sizes = array("S","M","L");

    $siz = $_GET["size"];
    $col = $_GET["color"];
    $quan = $_GET["quantity"];

    if($siz == $sizes[0])
        echo "<h2>No small shirts in the store</h2>";
        // M
    else if($siz == $sizes[1])
          {
            // M + BLUE
            if($col == $colors[0])
            echo "<h2>There are no $col shirts at the size you picked.</h2>";
            else 
            {
              echo "<h1>Your order is:</h1>";
              echo "<h2> Your shirt color is: $col</h2>";
              echo "<h2> Your size is: $siz</h2>";
              echo "<h2> Amount of shirts: $quan</h2>";
            }
          } 
          else if($col == $colors[1])
                    // L+ red 
                    echo "<h2>There are no $col shirts at the size you picked.</h2>";
                else
                {
                  echo "<h1>Your order is:</h1>";
                  echo "<h2> Your shirt color is: $col</h2>";
                  echo "<h2> Your size is: $siz</h2>";
                  echo "<h2> Amount of shirts: $quan</h2>";
                }  
  ?>
</body>
</html>