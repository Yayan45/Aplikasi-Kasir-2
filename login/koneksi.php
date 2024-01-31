<form action="ceklogin.php" method="post">
<?php

$koneksi =mysqli_connect("localhost","root","","kasir-yayan");

//cek koneksi
if(mysqli_connect_errno()){
    echo "koneksi database gagal :" . mysqli_connect_error();
}
?>