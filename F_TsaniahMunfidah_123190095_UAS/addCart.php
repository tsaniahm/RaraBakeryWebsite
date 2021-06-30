<?php 

session_start();
include "koneksi.php";
  $jmlcart = 0;

 if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  
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
        
        
        $dataa = mysqli_query($konek,"select * from product where id='$id_product'");
        while($a = mysqli_fetch_array($dataa)){
          $jmlcart = $jmlcart + $d['jumlah'];
        }
        }
          # code...
  }
  
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
<body >
	
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger font-weight-bold" href="index.php" style="font-size: 40px;">RARA BAKERY</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                         <li class="nav-item"><a class="nav-link js-scroll-trigger mt-3" href="index.php"><img src="assets/icons/loupe.png" style="width: 35px;"></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger mt-3" href="cart.php"><img src="assets/icons/sb.png" style="width: 35px;">(<?php echo $jmlcart; ?>)</a></li>
                    </ul>
                </div>
            </div>
        </nav>
         <nav class="navbar navbar-expand-lg navbar-light justify-content-center mb-0 ">
          <ul class="navbar-nav" >
             <li class="nav-item" style="width: 130px;" >
              <a class="nav-link" href="menu.php?all='all" style="font-size: 20px; color: #000000;font-family: Georgia, serif;">ALL MENU</a>
            </li>
            <li class="nav-item" style="width: 90px;" >
              <a class="nav-link" href="menu.php?kat='kue'" style="font-size: 20px; color: #000000;font-family: Georgia, serif;">CAKES</a>
            </li>
            <li class="nav-item"  style="width: 100px;" >
              <a class="nav-link " href="menu.php?kat='roti'" style="font-size: 20px; color: #000000;font-family: Georgia, serif;">BREADS</a>
            </li>
            <li class="nav-item"  style="width: 70px;" >
              <a class="nav-link " href="menu.php?kat='snack'" style="font-size: 20px; color: #000000;font-family: Georgia, serif;">SNACKS</a>
            </li>
          </ul>
        </nav> 
<hr class="mt-0 text-center" width="95%;"> 
    
    <?php 
    include "koneksi.php";

    $id = $_GET['id'];

    $data = mysqli_query($konek,"select * from product where id=$id");
    while($d = mysqli_fetch_array($data)){ 
    ?>

  
      <div class="row">
        <div class="col-md-3">
           <h2 class="font-weight-bold ml-5"><?php echo $d['name']; ?></h2>
            <p class=" ml-5" style="font-size: 25px;">IDR <?php echo number_format($d['price'], 0, ".", "."); ?></p>
            <h5 class="ml-5">QUANTITY</h5>

            <form  action="cartProsess.php" method="POST">
              <input type="hidden" name="id"  value="<?php echo $d['id']; ?>">
              <input type="number" name="jumlah" class="ml-5" style="width: 60px; height: 60px; border-color: black; border-radius: 10px;font-size: 20px;"> 
              <button type="submit" name="addcart" class="btn btn-army ml-3">ADD TO CART</button>
            </form>

             <img class="ml-5 mt-5" style="width: 100px;" src="gambarupload/<?php echo $d['foto']; ?>"  alt="...">
        </div>
        <div class="col-md-5">
           <img style="width: 500px;" src="gambarupload/<?php echo $d['foto']; ?>"  alt="...">
        </div>
        <div class="col-md-4">
           <p class="card-text mr-5 ml-2 text-justify "><b>[description]</b><br> <?php echo $d['description']; ?></p>
        </div>
      </div>
    
    <?php
    }
    ?>
  
</body>
</html>