<?php 
  include "koneksi.php";
  session_start();
  $email = $_SESSION['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];



  $query=mysqli_query($konek, "UPDATE user SET address='$address', phone='$phone'  WHERE email= '$email'")
	or die(mysqli_error($konek));

	if ($query) {
		header("location:account.php?pesan=alamat_berhasil");
	}
	else{
		header("location:addAdress.php?pesan=alamat_gagal");
	}

?>