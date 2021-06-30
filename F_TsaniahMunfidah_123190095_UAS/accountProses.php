<?php 
	session_start();
	//untuk mengecek apakah sudah login atau belum, jika sudah diarahkan ke halaman akun user kalau belum diarahkan ke halaman login
	$email = $_SESSION['email'];
	if (empty($_SESSION['email'])) {
		header("location:formLogin.php?pesan=belum_login");
	}else{header("location:account.php?pesan=berhasil");}
	?>

	