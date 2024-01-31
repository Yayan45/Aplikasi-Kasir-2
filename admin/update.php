<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

     <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <title>Restaurant</title>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container" style="margin-left: 500px;">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="margin-left:-495px;">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              <a class="nav-link active" href="lihat.php">Lihat data</a>
              <a class="nav-link active" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <?php
     
     //include file koneksi, untuk koneksikan ke database
  	include "koneksi.php";

  	//fungsi untuk mencegah inputan karakter yang tidak sesuai
  	function input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
  	}
  	//cek apakah ada nilai yang menggunakan method GET dengan id_anggota
  	if (isset($_GET['id_barang'])) {
  		$id_barang=input($_GET["id_barang"]);

  		$sql="select * from barang where id_barang=$id_barang";
  		$hasil=mysqli_query($kon,$sql);
  		$data = mysqli_fetch_assoc($hasil);
  	}

  	//cek apakah ada kiriman form dari method post
  	if ($_SERVER["REQUEST_METHOD"] == "POST") {

  	$id_barang=htmlspecialchars($_POST["id_barang"]);
        $nama=input($_POST["nama"]);
        $harga=input($_POST["harga"]);
        $jumlah=input($_POST["jumlah"]);
        $no_meja=input($_POST["no_meja"]);
             
         //query update data pada tabel anggota
          $sql="update barang set
                 nama='$nama',
                 harga='$harga',
                 jumlah='$jumlah',
                 no_meja='$no_meja'
                 where id_barang=$id_barang";

              //mengeksekusi atau menjalankan query di atas
                 $hasil=mysqli_query($kon,$sql);

              //kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
                 if ($hasil) {
                 	header("Location:lihat.php");
                 }
                 else {
                 	echo "<div class='alert alert-danger'>Data Gagal Diupdate.</div>";
                 }
  		  	}
  	?>
      <div class="text-center position-absolute top-50 start-50 translate-middle" style="font-family: 'Roboto', sans-serif">
        <form class="card p-5 bg-primary shadow-lg text-white" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <label class="form-label" for="nama">Nama Makanan/minuman</label>
          <input class="form-control" type="text" name="nama" id="nama" value="<?php
          echo $data['nama']; ?>" placeholder="" required/>
          <label class="form-label" for="harga">Harga</label>
          <input class="form-control" type="text" name="harga" id="harga" value="<?php
          echo $data['harga']; ?>" placeholder="" required/>
          <label class="form-label" for="jumlah">Jumlah Pesanan</label>
          <input class="form-control" type="number" name="jumlah" id="jumlah" value="<?php
          echo $data['jumlah']; ?>" placeholder="" required/>
           <label class="form-label" for="no_meja">No Meja</label>
          <input class="form-control" type="number" name="no_meja" id="no_meja" value="<?php
          echo $data['no_meja']; ?>" placeholder="" required/>
          <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>" />
          <button type="submit" name="submit" class="btn btn-success mt-3">Simpan Data</button>
      </form>
  </div>
      </div>
</body>
</html>