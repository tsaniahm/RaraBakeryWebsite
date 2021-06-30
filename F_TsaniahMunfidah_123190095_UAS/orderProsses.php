<?php 
  include "koneksi.php";
  session_start();

  $email = $_SESSION['email'];

  $name = $_POST['name'];
  $total = $_POST['total'];
  $address = $_POST['address'];
  $method = $_POST['method'];


 $query=mysqli_query($konek, "INSERT INTO invoice VALUES ('','$name','$address','$method','$total')")
	or die(mysqli_error($konek));

	if ($query) {

		if(!empty($_SESSION['email']))
   	 	{

		 $query = mysqli_query($konek, "SELECT * FROM user where email='$email'");
       	 while($data2=mysqli_fetch_array($query)){
       	 $id_user=$data2['id'];
       	 $name= $data2['name'];
       	 }
       	 	$queryy = mysqli_query($konek,"DELETE FROM cart WHERE id_user='$id_user'");
    	}


		header("location:purchaseHistory.php?name=$name&&pesan=berhasil");
	}
	else{
		header("location:checkout.php?pesan=gagal");
	}

	session_start();
	$email = $_SESSION['email'];
	if (empty($_SESSION['email'])) {
		header("location:formLogin.php?pesan=login_cart");}



		 

?>
