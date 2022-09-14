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
  <body class="bg-" style="background-color:#FFD8A9;">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Data peminjaman buku</h2>
      <p class="lead">Halaman ini memuat seluruh buku yang ada dipinjam</p>
      <a href="inputBorrow.php" class="btn btn- my-2" style="background-color:#F1A661;">Pinjam buku</a>
    </div>

    <div class="row g-5">
      <!-- <div class="col-md-5 col-lg-4 order-md-last"></div> -->
      <div class="col-md-12 col-lg-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Judul buku</th>
                    <th scope="col">Peminjam</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'variable.php';
                $variant = variable();

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

                $sql = "SELECT borrow.borrow_id, book.title, member.first_name, borrow.status FROM borrow
                INNER JOIN book ON borrow.book_id=book.book_id
                INNER JOIN member ON borrow.member_id=member.member_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['title']."</td>";
                        echo "<td>".$row['first_name']."</td>";
                        echo "<td>".$row['status']."</td>";
                        echo "<td>"."<a type='button' class='btn btn-' style='background-color:#E38B29; color:white;' href='updateBorrow.php?borrow_id=".$row['borrow_id']."'>Update</button>"."</td";
                        echo "<td>"."<a type='button' class='btn btn-' style='background-color:rgb(209, 103, 3); color:white;' href='deleteBorrow.php?borrow_id=".$row['borrow_id']."'>Hapus</button>"."</td";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
      </div>
    </div>
  </main>
  <div class="back"><button style="border:none; border-radius: 7px; background-color:#F1A661; width: 100px; height:50px; margin-left:420px; margin-top:30px;" ><a href="index.php" style="color:white; text-decoration:none; font-size: 20px;">Kembali</a></button></div>
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