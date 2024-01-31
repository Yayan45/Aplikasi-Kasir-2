<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Restaurant</title>
    <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
 <!-- ======= Header ======= -->
 <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="bi bi-egg-fried"></i>
        <h1> NyamNyam</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Beranda</a></li>
          <li><a href="lihat.php" >Lihat Data</a></li>
          <li><a href="edit.php" class="active">Edit data</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="../login/logout.php">Logout</a></li>
          
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><br><br><br><!-- End Header -->
    <div class="container"><br><br><br><br>
    <center><h1 style="font-family:courier; letter-spacing:7px; color: white; bg-color:white;"> Edit Data</h1></center>
<?php
      include "koneksi.php";
       //cek apakah nilai dari method get dengan nama id_anggota
      if(isset($_GET['id_barang'])){
        $id_barang=htmlspecialchars($_GET["id_barang"]);

        $sql="delete from barang where id_barang='$id_barang'";
        $hasil=mysqli_query($kon,$sql);
        //kondisi apakah berhasil atau tidak
         if ($hasil) {
          header("location:edit.php");
         }
         else {
          echo "<div class='alert alert-danger'>Data gagal dihapus</div>";
         }
      }
    ?>
<table class="table table-bordered table-hover bg-light"><br>
      <thead>
        <tr>
          <th>No</th>
          <th>makanan/minuman</th>
          <th>harga</th>
          <th>jumlah</th>
          <th>No meja</th>
          <th>tanggal</th>
          <th colspan="2">Aksi</th>
        </tr>
      </thead>
      <?php
          include "koneksi.php";
          $sql="select * from barang order by id_barang desc";
          $hasil=mysqli_query($kon,$sql);
          $no=0;
          while ($data = mysqli_fetch_array($hasil)) {
            $no++;
          
      ?>
      <tbody>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $data["nama"];  ?></td>
          <td><?php echo $data["harga"];  ?></td>
          <td><?php echo $data["jumlah"];  ?></td>
          <td><?php echo $data["no_meja"];  ?></td>
          <td><?php echo $data["tanggal"];  ?></td>
          <td>
            <a href="update.php?id_barang=<?php echo htmlspecialchars($data['id_barang']);?>" class="btn btn-info" role="button">update</a>
            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_barang=<?php echo $data['id_barang'];?>" class="btn btn-danger" role="button">Delete</a>
          </td>
        </tr>
      </tbody>
      <?php
    }
    ?>
    </table>
    </div>
</body>
</html>