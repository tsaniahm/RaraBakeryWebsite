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

	 <nav class="navbar navbar-expand-lg navbar-light  " id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger font-weight-bold" href="#page-top" style="font-size: 40px;">RARA BAKERY</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger " href="menu.php?all='all'"><img src="assets/icons/close.png" style="width: 30px;"></a></li>
                    </ul>
                </div>
            </div>
        </nav>

     <h1 class="text-center" style="font-family: times;">Your Cart</h1>
	<div class="row">
   		 		<div class="col-md-2"></div>
   		 		<div class="col-md-4 card text-white pb-4" style="background-color: #000000;">
   		 			
	<?php 
	session_start();
	$email = $_SESSION['email'];
	if (empty($_SESSION['email'])) {
		header("location:formLogin.php?pesan=login_cart");}


	include "koneksi.php";

		$email = $_SESSION['email'];
		$subtotal=0;
    $jumlahitem = 0;

		 if(!empty($_SESSION['email']))
   	 	{

		 $query = mysqli_query($konek, "SELECT * FROM user where email='$email'");
       	 while($data2=mysqli_fetch_array($query)){
       	 $id_user=$data2['id'];
       	 }

    	}

		  	$data = mysqli_query($konek,"select * from cart where id_user='$id_user'");
   		 	while($d = mysqli_fetch_array($data)){

   		 	$id_product = $d['id_product'];
        $id_cart= $d['id'];
   		 	
   		 	$dataa = mysqli_query($konek,"select * from product where id='$id_product'");
   			while($a = mysqli_fetch_array($dataa)){
          
   		 	?>
   		 			<div class="row mt-4 ">
   		 				<div class="col-md-6"><img style="width: 200px;" src="gambarupload/<?php echo $a['foto']; ?>"  alt="..."></div>
   		 				<div class="col-md-6">
   		 					<p class="mb-0"><?php echo $a['name'];?></p>
   		 					<p class="mb-0">RP. <?php  echo number_format($a['price'], 0, ".", ".");?> / Item</p>
   		 					<p class="mb-0"> QUANTITY: <?php echo $d['jumlah'];?></p>
   		 					<div class="row mt-1">
   		 						<div class="col-md-2">
   		 							<form action="cartProsess.php" method="POST">
		   		 						<input type="hidden" name="id"  value="<?php echo $a['id']; ?>">
		   		 						<input type="hidden" name="jumlah" value="-1" style="width: 40px;" placeholder="<?php echo $d['jumlah'];?>">
		   		 						<button type="submit" name="submit" class="btn-sm btn-armyy">-</button>
		   		 					</form></div>
   		 						<div class="col-md-2"><p class="text-white ml-2"><?php echo $d['jumlah'];?></p></div>
   		 						<div class="col-md-2">
   		 							<form action="cartProsess.php" method="POST">
		   		 						<input type="hidden" name="id"  value="<?php echo $a['id']; ?>">
		   		 						<input type="hidden" name="jumlah" value="1" style="width: 40px;" placeholder="<?php echo $d['jumlah'];?>">
		   		 						<button type="submit" name="submit" class="btn-sm btn-armyy"> + </button>
		   		 					</form>
   		 						</div>
   		 					</div>
   		 					<p> Rp. <?php $totalperitem =  $d['jumlah']*$a['price']; echo number_format($totalperitem, 0, ".", ".");?> </p>
   		 				</div>
   		 			</div>
    	<?php
          $jumlahitem = $jumlahitem + $d['jumlah'];
   		   $subtotal = $subtotal+ $totalperitem; }}
	   ?>

			
   		</div>
   		 	<div class="col-md-4 text-white">
   		 		<div class="card px-4"  style="background-color: #000000;">
   		 			<h2 class="mt-4">SUBTOTAL ( <?php echo $jumlahitem; ?> ITEMS) <br> Rp. <?php echo number_format($subtotal, 0, ".", "."); ?></h2>
   		 		  <?php if ($subtotal == 0 ) {
              echo "<h3 class='mt-4'>CART IS EMPTY</h3>";
              echo " <a href='menu.php?all=all' class='btn btn-armyy mb-5 mt-4'> CONTINUE SHOPPING</a>";
            }else{ ?>
              <a href="checkout.php" class='btn btn-armyy mb-5 mt-5'> CHECKOUT</a>
          <?php  } ?>
   		 			
   		 		</div>
   		 		</div>
   		 	<div class="col-md-2"></div>
   		</div>
   		 	
   			<br>

</body>
</html>