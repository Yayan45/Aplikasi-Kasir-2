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

      <a href="index.php" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="bi bi-egg-fried"></i>
        <h1> NyamNyam</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active">Beranda</a></li>
          <li><a href="lihat.php">Lihat Data</a></li>
          <li><a href="edit.php">Edit data</a></li>
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
  </header><!-- End Header -->
      <?php
  	//include file koneksi untuk koneksikan ke database
  	include "koneksi.php";

  	//koneksi untuk mencegah inputan karakter yang tidak sesuai
  	function input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
  	}
  	//cek apakah ada kiriman fare dari method post
  	if($_SERVER["REQUEST_METHOD"] == "POST"){
  		$nama=input($_POST["nama"]);
  		$harga=input($_POST["harga"]);
  		$jumlah=input($_POST["jumlah"]);
      $no_meja=input($_POST["no_meja"]);
      // $tanggal=input($_POST["tanggal"]);


  		//query input menginput data kedalam tabel anggota
  		$sql="insert into barang (nama,harga,jumlah,no_meja) values
  		    ('$nama','$harga','$jumlah','$no_meja')";

  		    //mengeksekusi/menjalankan query diatas
  		    $hasil=mysqli_query($kon,$sql);

  		    //kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
  		    if ($hasil) {
  		    	header("location:lihat.php");
  		    }
  		    else {
  		    	echo "<div class='alert alert-danger'>Data Gagal Disimpan</div>";
  		    }
  	}
  	?>
    
      <div class="text-center position-absolute top-50 start-50 translate-middle" style="font-family: 'Roboto', sans-serif">
      <form class="card p-5 bg-light shadow-lg text-dark" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
	    <h1 style="font-family:courier;">Pesan Disini !</h1>
		<label class="form-label" for="nama">Nama Makanan/minuman</label>
		<input class="form-control" type="text" name="nama" id="nama" placeholder="" required/>
		<label class="form-label" for="harga">Harga</label>
		<input class="form-control" type="text" name="harga" id="harga" placeholder="" required/>
		<label class="form-label" for="jumlah">Jumlah Pesanan</label>
		<input class="form-control" type="number" name="jumlah" id="jumlah" placeholder="" required/>
    <label class="form-label" for="no_meja">No meja</label>
		<input class="form-control" type="number" name="no_meja" id="no_meja" placeholder="" required/>
		<button type="submit" name="submit" class="btn btn-primary mt-3">Simpan Data</button>
	</form>
</div>
</body>
</html>