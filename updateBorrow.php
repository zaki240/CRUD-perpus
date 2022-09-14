<?php
include 'variable.php';
$variant = variable();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $book_id = $member_id = $status = "";

    $servername = $variant[0];
    $username = $variant[1];
    $password = $variant[2];
    $dbname = $variant[3];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT borrow_id, book_id, member_id, status FROM borrow WHERE borrow_id = ".$_GET['borrow_id'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $book_id = $row['book_id'];
            $member_id = $row['member_id'];
            $status = $row['status'];
        }
    } else {
        echo "0 results";
    }

    $conn->close();
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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Menyunting Buku</h2>
      <p class="lead">Silakan isi data buku yang akan diperbaharui di database.</p>
    </div>

    <div class="row g-5">
      <!-- <div class="col-md-5 col-lg-4 order-md-last"></div> -->
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Data Buku</h4>
        <form class="needs-validation" novalidate method="post" action="editBorrow.php">
          <div class="row g-3">
            <div class="col-12">
              <input type="text" name="borrow_id" value="<?php echo $_GET['borrow_id']; ?>" hidden>

              <label for="book_id" class="form-label">ID buku</label>
              <input type="text" name="book_id" class="form-control" id="book_id" value="<?php echo $book_id ?>" required>
              <div class="invalid-feedback">
                Masukkan ID buku.
              </div>
            </div>

            <div class="col-12">
              <label for="member_id" class="form-label">ID member</label>
              <div class="input-group has-validation">
                <input type="text" name="member_id" class="form-control" id="member_id" value="<?php echo $member_id ?>" required>
              <div class="invalid-feedback">
                Masukkan ID member.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                <option value="available">Tersedia</option>
                <option value="borrowed">Dipinjam</option>
              </select>              
            <div class="invalid-feedback">
                Masukkan status.
              </div>
            </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit">Update data pinjaman</button>
        </form>
      </div>
    </div>
  </main>

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