<?php 
	session_start();
	include "koneksi.php";

	if(isset($_POST['submitlogin'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = mysqli_query($konek, "SELECT * from user WHERE email='$email' && password='$password'") or die (mysqli_error($konek));

	$cek =  mysqli_num_rows($query);

	if ($cek > 0) {

		while ($row = mysqli_fetch_assoc($query)) {
			
			
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				header("location:index.php");
			
		}
		
	}else{
		header("location:formLogin.php?pesan=gagal");
	}
	
	}
	elseif (isset($_POST['submitsignup'])) {
		
	$name = $_POST['fullnamesignup'];
	$email = $_POST['emailsignup'];
	$password = $_POST['passwordsignup'];

	$queryy = mysqli_query($konek, "SELECT * from user WHERE email='$email'") or die (mysqli_error($konek));

	$cek =  mysqli_num_rows($queryy);

	if ($cek >0) {
		header("location:formSignup.php?pesan=email_sudahada");
	}
	else{

		$query=mysqli_query($konek, "INSERT INTO user VALUES ('', '$name', '$email', '$password', '', '')")
	or die(mysqli_error($konek));

	if ($query) {
		header("location:formLogin.php?pesan=signup_berhasil");
	}
	else{
		header("location:formSignup.php?pesan=signup_gagal");
	}
	}
	}
	elseif (isset($_POST['submitlogout'])) {
		session_destroy();
		header("location:index.php?pesan=logout");
	}

?>