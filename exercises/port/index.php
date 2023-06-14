<?php
   include "config.php"; 
   include "db.php";
   
    $query  = "SELECT * FROM tbl_92_prog";
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
    <title>yoav zucker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container flex-column" id="container_for_nav">
      <a class="navbar-brand mb-4" href="#">
          <h2>My page</h2>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto flex-column text-center">
          <li class="nav-item">
            <a class="nav-link " href="#Home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#About">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#Projects">Projects</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="wrapper">
    <section id="Home"class="full-page border rounded">
      <div class="container text-center ">
        <div class="row">
          <div class="col text-white">
            <h1>Hello and welcome  to my page</h1>
            <h2>Shenkar College of Engineering.</h2>
          </div>
         
        </div>
      </div>
    </section>

    <section id="About"class="full-page border rounded">
      <div class="container text-center">
        <div class="row">
          <div class="row">
            <div class="col-3 text-white"><h1>About</h1></div>
          </div>
          <div class="col-2"></div>
          <div class="col-8">
            
            <p class="text-white">My name is Yoav Zucker, Im a 23. I have excellent interpersonal skills and experience in individual
              and frontal training. I am a team player.
              I am fast self-learning, dedicated, patient and highly motivated</p>
              <button type="button" class="btn btn-outline-secondary"><a href="#">My CV</a></button>
          </div>
          <div class="row mt-3 text-white">
            <p>My email: y@gmail.com</p>
            <p>My phone number: 055-5555555</p>
            <a href="#"><i class="bi bi-facebook"></i> My facebook</a>
            <a href="#"><i class="bi bi-instagram"></i> My instagram</a>
            <a href="#"><i class="bi bi-linkedin"></i> My linkedin</a>
            <a href="#"><i class="bi bi-whatsapp"></i> My whatsapp</a>
          </div>
        
        </div>
        
      </div>
    </section>

    <section id="Projects" class="full-page border rounded">
      <div class="container">
      <div class="row">
            <div class="col-3 text-white"><h1>Projects</h1></div>
          </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col">
                    <div class="card">
                      <img src="images/25336.jpg" class="card-img">
                      <div class="card-img-overlay">
                        <h5 class="card-title">' . $row["prog_name"] . '</h5>
                        <p class="card-text">' . $row["Prog_summery"] . '.</p>
                        <p class="card-text">Grade: ' . $row["prog_grade"] . '.</p>
                        <div class="additional-info">
                          <p>URL: ' . $row["prog_url"] . '.</p>
                        </div>
                      </div>
                    </div>
                  </div>';
          }
          ?>
        </div>
      </div>
    </section>
    <div class="container-fluid d-inline-block shenkar">
        <img src="images/shenkar.png" class="shenkar-img">
    </div> 
  </div>
  <footer>
    <a href="https://www.shenkar.ac.il/he/departments/engineering-software-department">תואר ראשון בהנדסת תוכנה בשנקר</a>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>




