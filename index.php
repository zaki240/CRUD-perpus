<?php
include 'variable.php';
$variant = variable();
  
$servername = $variant[0];
$username = $variant[1];
$password = $variant[2];
$dbname = $variant[3];

mysqli_report(MYSQLI_REPORT_OFF);

$link = new mysqli($servername, $username, $password);
if (!$link) {
    die('Could not connect: ' . $link->connect_error);
}

// Make my_db the current database
$db_selected = $link->select_db('library_db');

if (!$db_selected) {
  // If we couldn't, then it either doesn't exist, or we can't see it.
  $sql = 'CREATE DATABASE library_db';

// <script>console.log('test');</script>

  if ($link->query($sql)) {
      echo "Database library_db telah dibuat";
  } else {
      echo 'Error creating database: ' . $link->connect_error . "\n" ;
  }
} else {
  echo "<script>console.log('[database sudah dibuat]');</script>";
}

mysqli_close($link);

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$book_sql = "CREATE TABLE `library_db`.`book` ( 
  `book_id` INT NOT NULL AUTO_INCREMENT , 
  `title` VARCHAR(50) NOT NULL , 
  `author` VARCHAR(50) NOT NULL , 
  `published_date` DATE NOT NULL, 
  PRIMARY KEY (`book_id`)) ENGINE = InnoDB;";
$member_sql = "CREATE TABLE `library_db`.`member` ( 
  `member_id` INT NOT NULL AUTO_INCREMENT , 
  `first_name` VARCHAR(50) NOT NULL , 
  `last_name` VARCHAR(50) NOT NULL , 
  `email` VARCHAR(50) NOT NULL, 
  `register_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`member_id`)) ENGINE = InnoDB;";
$borrow_sql = "CREATE TABLE `library_db`.`borrow` ( 
  `borrow_id` INT NOT NULL AUTO_INCREMENT , 
  `book_id` INT NOT NULL , 
  `member_id` INT NOT NULL , 
  `status` ENUM('available','borrowed') NOT NULL ,  
  PRIMARY KEY (`borrow_id`)) ENGINE = InnoDB;";

if ($conn->query($book_sql) === TRUE) {
  echo "Table book created successfully";
} else {
  echo "<script>console.log('Error creating book table: table book sudah dibuat');</script>";
}
if ($conn->query($member_sql) === TRUE) {
  echo "Table book created successfully";
} else {
  echo "<script>console.log('Error creating member table: table member sudah dibuat');</script>";
}
if ($conn->query($borrow_sql) === TRUE) {
  echo "Table book created successfully";
} else {
  echo "<script>console.log('Error creating borrow table: table borrow sudah dibuat');</script>";
}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .konten{
        display: flex;
        justify-content: space-evenly;
      }
      .card1{
        display: flex;
        border: 2px solid black;
        margin: 15px;
        padding: 6px;
        border-radius:10px;
      }
      .gambar{
           width:300px;
      }
      img{
        width:80%;
      }
      .isi1{
        font-size:15px;
        padding:10px;
        width:
      
      }
      

    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">

<div class="container">
  <main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light"> Perpustakaan</h1>
                <p class="lead text-muted">Website ini bisa mempermudah proses pinjam meminjam buku</p>
                <p>
                    <a href="readBooks.php" class="btn btn-primary my-2">Buku</a>
                    <a href="readMembers.php" class="btn btn-primary my-2">Member</a>
                    <a href="readBorrow.php" class="btn btn-primary my-2">Pinjaman Buku</a>
                </p>
            </div>
        </div>
    </section>
  </main>

  <div class="konten">
    <div class="card1"> 
        <div class="gambar"><img src="unknown.png" alt="" ></div>
        <div class="isi1">Baca Buku Online Gratis Jutaan Buku Tersedia Disini Melalui Pinjaman Digital        </div>
   </div>
    <div class="card1">
      <div class="gambar"><img src="unknown (1).png" alt=""></div>
        <div class="isi1">Simpan Buku Favoritmu Dan Bacalah saat punya waktu luang</div>
      </div>
    <div class="card1">
      <div class="gambar"><img src="unknown (2).png" alt=""> </div>
        <div class="isi1">Coba Menjelajah perpustakaan virtual Dan Atur Buku sesukamu</div>
      </div>
  </div>


  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
