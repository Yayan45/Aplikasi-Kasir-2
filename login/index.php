<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="background">

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>

	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="ceklogin.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="" required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="" required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN">
 
			<br/>
			<br/>
		</form>
		
	</div>
 
 
</body>
</html>