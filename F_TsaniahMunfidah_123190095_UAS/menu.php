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
  <hr class="mt-0 text-center" width="90%;"> 

    <?php 
    if(isset($_GET['all'])){ 
      echo "<h5 class='ml-5 pl-5'>MENU / ALL CATEGORY</h5>";
    }else{ echo "<h5 class='ml-5 pl-5 text-uppercase'>MENU / ".$_GET['kat']."</h5>";    }
    ?>
    

    <div class="row ml-5">
    <?php 
    include "koneksi.php";
    if (isset($_GET['all'])) {
    $data = mysqli_query($konek,"select * from product");
    while($d = mysqli_fetch_array($data)){ 
    ?>

    <div class="col-md-3 my-4 ml-5">
            <a href="addCart.php?id=<?php echo $d['id']?>" style="text-decoration: none; color: #000000;">
            <div class="card">
          <img  src="gambarupload/<?php echo $d['foto']; ?>" class="card-img-top"  alt="...">
          <div class="card-body" style="background-color: #f5f5f5;">
            <h5 class="card-title font-weight-bold text-right"><?php echo $d['name']; ?></h5>
            <p class="card-text text-right"><?php $num_char = 50;  echo substr($d['description'], 0, $num_char) . '...'; ?></p>
            <p class="card-text text-right"><b>IDR <?php echo number_format($d['price'], 0, ".", "."); ?></b></p>
            </a>
          </div>
          </div>
        </div>
   <?php }}else{

    $category= $_GET['kat'];

    $data = mysqli_query($konek,"select * from product where category = $category");
    while($d = mysqli_fetch_array($data)){ 
    ?>

    <div class="col-md-3 my-4 ml-5">
            <a href="addCart.php?id=<?php echo $d['id']?>" style="text-decoration: none; color: #000000;">
            <div class="card">
          <img  src="gambarupload/<?php echo $d['foto']; ?>" class="card-img-top"  alt="...">
          <div class="card-body" style="background-color: #f5f5f5;">
            <h5 class="card-title font-weight-bold text-right"><?php echo $d['name']; ?></h5>
            <p class="card-text text-right"><?php $num_char = 50;  echo substr($d['description'], 0, $num_char) . '...'; ?></p>
            <p class="card-text text-right"><b>IDR <?php echo number_format($d['price'], 0, ".", "."); ?></b></p>
            </a>
          </div>
          </div>
        </div>

    <?php }} ?>
    
    </div>
</body>
</html>