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
                </div>
            </div>
        </nav>

     <h1 class="text-center" style="font-family: times;">Checkout</h1>
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
    $jumlahitem=0;

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
   		 			<div class="row mt-3 ">
   		 				<div class="col-md-4"><img style="width: 120px;" src="gambarupload/<?php echo $a['foto']; ?>"  alt="..."></div>
   		 				<div class="col-md-5">
   		 					<p class="mb-0"><?php echo $a['name'];?></p>
   		 					<p class="mb-0">RP. <?php  echo number_format($a['price'], 0, ".", ".");?> / Item</p>
   		 					<p>Rp. <?php $totalperitem =  $d['jumlah']*$a['price']; echo number_format($totalperitem, 0, ".", ".");?> </p>
   		 				</div>
              <div class="col-md-3"> <p class="mb-0"> QYT: <?php echo $d['jumlah'];?></p></div>
   		 			</div>
    	   <?php
          $jumlahitem = $jumlahitem + $d['jumlah'];
   		   $subtotal = $subtotal+ $totalperitem; }}
	        ?>
         <h3 class="mt-4 ml-1">SUBTOTAL (<?php echo $jumlahitem; ?> ITEMS) <br> Rp. <?php echo number_format($subtotal, 0, ".", "."); ?></h3>
   		  </div>

   		 	<div class="col-md-4">
         <div class="card px-4 text-white"  style="background-color: #000000;">
            <?php
              $data = mysqli_query($konek,"select * from user where email='$email'");
              $d = mysqli_fetch_array($data);
             ?>
             <p class="ml-2 mt-3"><b>Shipping Address :<br><?php echo $d['name']; ?></b><br> <?php echo $d['address']; ?></p>

             <form action="orderProsses.php" method="POST">
                  <input type="hidden"  name="name" value="<?php echo $d['name']; ?>">
                  <input type="hidden"  name="address" value="<?php echo $d['address']; ?>">
                  <input type="hidden"  name="total" value="<?php echo $subtotal ?>">
                  <div class="form-group ml-2">
                       <label for="exampleInputPassword1"><b>Payment Methode</b></label><br>
                       <select name="method" id="kategori" style="border-radius: 5px; height: 40px;">
                        <option disabled="" selected="">Choose Payment Methode</option>
                        <option value="Tranfer Bank">Tranfer Bank</option>
                        <option value="E-wallet">E-wallet</option>
                       </select>
                  </div>
                  <h5 class="ml-2"> Shipping cost : Free </h5>
                   <h3 class="mt-1 ml-1">TOTAL PAYMENT<br> Rp. <?php echo number_format($subtotal, 0, ".", "."); ?></h3>
                  <button type="submit" name="submit" class="btn btn-armyy mt-3 text-center" style="width: 350px;"> PLACE ORDER</button>

            </form>
              <a href="cart.php" class="btn btn-taransparant mb-5 mt-2" style="width: 350px;">BACK TO CART</a>
         </div> 
        </div>

        <div class="col-md-2"></div>
  </div>
  <br>

</body>
</html>