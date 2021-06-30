
<?php 
session_start();

include 'koneksi.php';

$email = $_SESSION['email'];


    if(!empty($_SESSION['email']))
    {
        $query = mysqli_query($konek, "SELECT * FROM user where email='$email'");
        while($data2=mysqli_fetch_array($query)){
        $id_user=$data2['id'];
        }

        $id_product = $_POST['id'];
	    $jumlah = $_POST['jumlah'];

	    $query=mysqli_query($konek, "SELECT * from cart where id_product='$id_product' && id_user='$id_user'");
	    $data=mysqli_fetch_array($query);
	    $jumlaha=$data['jumlah'];

	    if(!isset($data))
	    {
	        $query=mysqli_query($konek, "INSERT INTO cart VALUES ('','$id_user','$id_product','$jumlah')")
	        or die(mysqli_error($konek));
	        header("location:cart.php");
	    }
	    else
	    {
	        $jumlaht=$jumlaha+$jumlah;
	        if ($jumlaht==0) {
	        	$query=mysqli_query($konek, "DELETE FROM cart where id_product='$id_product' && id_user='$id_user'")
	    		or die(mysqli_error($konek));
	    		header("location:cart.php");
	        }else{
	        $query=mysqli_query($konek, "UPDATE cart set jumlah='$jumlaht' where id_product='$id_product' && id_user='$id_user'")
	    	or die(mysqli_error($konek));
	    	header("location:cart.php");
	    }
	    }

    }
    else
    {
        header("location:formLogin.php?pesan=login_cart");
    } 

  	
   
?>