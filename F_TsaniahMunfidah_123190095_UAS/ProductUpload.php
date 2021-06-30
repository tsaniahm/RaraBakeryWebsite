<?php 
include 'koneksi.php';

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$category = $_POST['category'];

	$rand = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$filename = $_FILES['foto']['name'];
	$ukuran = $_FILES['foto']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$ekstensi) ) {
		header("location:account.php?alert=gagal_ekstensi");
	}else{
		if($ukuran < 1044070){		
			$xx = $rand.'_'.$filename;
			move_uploaded_file($_FILES['foto']['tmp_name'], 'gambarupload/'.$rand.'_'.$filename);
			mysqli_query($konek,"INSERT INTO product VALUES ('', '$name', '$description','$price', '$xx' , '$category')");
			header("location:account.php?alert=berhasil");
		}else{
			header("location:account.php?alert=gagak_ukuran");
		}
	}
}
elseif(isset($_POST['submithapus'])){

	$id = $_GET['id'];

	$query = mysqli_query($konek,"DELETE FROM product WHERE id='$id'");
	$queryy = mysqli_query($konek,"DELETE FROM cart WHERE id_product='$id'");

	if ($query) {
		header("location:adminpage.php?id=cek&&pesan=berhasil_hapus");
	}
	else{
		header("location:adminpage.php?id=cek");
	}
}
elseif (isset($_POST['submitedit'])) {

	$id = $_GET['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	

	$rand = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$filename = $_FILES['foto']['name'];
	$ukuran = $_FILES['foto']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	
	if(!in_array($ext,$ekstensi) ) {
	header("location:edit_article.php?alert=gagal_ekstensi");
	}else{
		if($ukuran < 1044070){		
			$xx = $rand.'_'.$filename;
			move_uploaded_file($_FILES['foto']['tmp_name'], 'gambarupload/'.$rand.'_'.$filename);
			mysqli_query($konek, "UPDATE product SET name='$name', description='$description', price='$price', foto='$xx', category='$category' where id='$id'");
			header("location:adminpage.php?id=cek&&pesan=berhasil_edit");
		}else{
			header("location:adminpage.php?id=cek");
		}
	}
}

?>