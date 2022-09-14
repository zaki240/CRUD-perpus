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
      <h2>Menambahkan Member</h2>
      <p class="lead">Silakan isi data member yang akan didaftarkan</p>
    </div>

    <div class="row g-5">
      <!-- <div class="col-md-5 col-lg-4 order-md-last"></div> -->
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Data Member</h4>
        <form class="needs-validation" novalidate method="post" action="addMember.php">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="first_name" class="form-label">Nama depan</label>
              <input name="first_name" type="text" class="form-control" id="first_name" placeholder="" style="background-color:#FDEEDC;" value="" required>
              <div class="invalid-feedback">
                Nama depan harus diisi.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="last_name" class="form-label">Nama belakang</label>
              <input type="text" name="last_name" class="form-control" id="last_name" placeholder="" style="background-color:#FDEEDC;" value="" required>
              <div class="invalid-feedback">
                Nama belakang diisi.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder=""  style="background-color:#FDEEDC;" required>
              <div class="invalid-feedback">
                Pastikan email yang dimasukkan valid.
              </div>
            </div>

          <button class="w-100 btn btn- btn-lg" style="background-color:#F1A661;" type="submit">Tambahkan member</button>
        </form>
      </div>
    </div>
  </main>
  <div class="back"><button style="border:none; border-radius: 7px; background-color:#F1A661; width: 100px; height:50px; margin-left:420px; margin-top:30px;" ><a href="index.php" style="color:black; text-decoration:none; font-size: 20px;">Kembali</a></button></div>
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