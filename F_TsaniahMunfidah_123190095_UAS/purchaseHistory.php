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
<body >
	
        <nav class="navbar navbar-expand-lg navbar-light  " id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger font-weight-bold" href="#page-top" style="font-size: 40px;">RARA BAKERY</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger " href="account.php"><img src="assets/icons/close.png" style="width: 30px;"></a></li>
                    </ul>
                </div>
            </div>
        </nav>

  <hr class="mt-0 text-center" width="90%;"> 
     <h1 class="text-center" style="font-family: times;"> Your Purchase History</h1>

    <div class="row ml-5">
    <?php 
    include "koneksi.php";
    $name = $_GET['name'];

    $data = mysqli_query($konek,"select * from invoice where name='$name'");
    while($d = mysqli_fetch_array($data)){ 
      $name = $d['name'];

    ?>

    <div class="col-md-3 my-4 ml-5">
            <div class="card">
          <div class="card-body" style="background-color: #f5f5f5;">
            <h5 class="card-title"><?php echo $d['name']; ?></h5>
            <h5 class="card-title"><?php echo $d['address']; ?></h5>
            <h5 class="card-title"><?php echo $d['method']; ?></h5>
            <p class="card-text"><b>IDR <?php echo number_format($d['total'], 0, ".", "."); ?></b></p>
            <p class="card-text"></p>
            <?php if ($d['method'] == 'E-wallet') {
              echo "<p class='card-text'>Transfer to Dana/Ovo/Gopay <br>Phone Number : 0738433234</p>";
            }elseif ($d['method'] == 'Tranfer Bank') {
               echo "<p class='card-text'>Transfer to BNI <br> No rekening : 093726783</p>";
            } ?>
          </div>
          </div>
    </div>

    <?php }?>
</body>
</html>