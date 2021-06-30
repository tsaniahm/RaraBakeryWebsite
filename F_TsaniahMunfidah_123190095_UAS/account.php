<?php 
	session_start();
	$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
	 <!-- Navigation-->
         <nav class="navbar navbar-expand-lg navbar-light  " id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger font-weight-bold" href="#page-top" style="font-size: 40px;">RARA BAKERY</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger " href="index.php"><img src="assets/icons/close.png" style="width: 30px;"></a></li>
                    </ul>
                </div>
            </div>
        </nav>

      <?php if ($_SESSION['email']== "Admin@gmail.com") {?> 
      	<h1 class="text-center" style="font-family: times;"> ADMIN</h1>
        <center>
      	 <a href="adminpage.php?id=tambah" class="btn btn-black-outer">Tambah Produk</a><br><br>
         <a href="adminpage.php?id=cek" class="btn btn-black-outer">Cek List Produk</a>
          </center>
      <?php }else{ ?> 

    <section>
     <h1 class="text-center" style="font-family: times;"> My Account</h1>
     <?php 
		  include "koneksi.php";
		  $data = mysqli_query($konek,"select * from user where email='$email'");
		  $d = mysqli_fetch_array($data);
		 ?>

		<center>
		<h2><?php echo $d['name']?></h2>
		<h2><?php echo $email; ?></h2>
    <br>
    <a href="purchaseHistory.php?name=<?php echo $d['name']?>" class="btn btn-black-outer">MY PURCHASE HISTORY</a>
    <br>
    <br>
    <?php 
    if(empty($d['address'])){ echo '<a href="addAddress.php" class="text-uppercase btn btn-black-outer">Add Address</a>'; }
    else{ echo '<a href="addAddress.php" class="text-uppercase btn btn-black-outer">Change Address</a>';}
    ?>
    <p><br>saved address: <br> <?php echo $d['address']." - ".$d['phone']?></p>
		</center>

    </section>

	 <?php } ?>

   <center>
	 <form action="LoginSignupProsses.php" method="POST">
	 <button type="submit" name="submitlogout" class="btn btn-army mt-3">logout</button>
	 </form>
	 </center> 

</body>
</html>