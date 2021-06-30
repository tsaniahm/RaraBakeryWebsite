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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger " href="index.php"><img src="assets/icons/close.png" style="width: 30px;"></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php 
        if(isset($_GET['pesan'])){
          if ($_GET['pesan'] == "login_cart") {
            echo "<p class='text-center'>ANDA PERLU LOGIN UNTUK MENGAKSES CART</p>";
          }elseif ($_GET['pesan'] == "gagal") {
             echo "<p class='text-center'>AKUN BELUM TERDAFTAR SILAHKAN REGISTRASI TERLEBIH DAHULU</p>";
          }elseif ($_GET['pesan'] == "signup_berhasil") {
             echo "<p class='text-center'>REGISTER BERHASIL! SILAHKAN LOGIN</p>";
          }
        }
        ?>
        <section>
            <h1 class="text-center" style="font-family: times;"> Login</h1>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="LoginSignupProsses.php" method="POST">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="">
                          </div>
                          
                          <button type="submit" name="submitlogin" class="btn btn-army">LOGIN</button>
                         <a href="formSignup.php" class="btn btn-black-outer">SIGNUP</a>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
        </section>

</body>
</html>