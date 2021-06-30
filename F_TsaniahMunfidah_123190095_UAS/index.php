<?php 
session_start();

include "koneksi.php";

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
       
        <nav class="navbar navbar-expand-lg navbar-light fixed-top " id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger text-white font-weight-bold" href="#homepage" style="font-size: 40px;">RARA BAKERY</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="#about" style="font-size: 25px;">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="menu.php?all='all'" style="font-size: 25px;">Order</a></li>
                        <li class="nav-item" style="font-size: 25px;"><a class="nav-link js-scroll-trigger text-white" href="#location">Locations</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="accountProses.php"><img src="assets/icons/account.png" style="width: 40px;"></a></li>
                    </ul>
                </div>
            </div>
        </nav>
         <header class="mainbg" id="homepage">
          
            <h1 class="text-uppercase text-white text-center" style="font-family: times">Bakery with high quality products</h1>
            <p class="text-uppercase text-center text-white">Made with love and passion</p>
            <center><a href="menu.php?all='all'" class="btn btn-taransparant"> SEE OUR MENU</a></center>
            
          
        </header>
         <!-- About-->
        <section class="about-section" id="about">
            <div class="container text-center">
                <div class="row">
                     <div class="col-lg-6 mx-auto mt-5">
                       <img src="assets/img/about.jpg" width="400px;">
                     </div>
                    <div class="col-lg-6 mx-auto">
                        <h2 class="text-white mb-4" style="font-size: 65px;">Rara Bakery Company</h2>
                        <p class="text-white-50 " style="font-size: 23px;">
                             Rara Bakery Company adalah perusahaan atau toko kue yang bergerak di bidang kuliner dan meyediakan berbagai makanan seperti berupa roti, cake, dan jajanan tradisional.</b>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="loc-section" id="location">
          <div class="container text-center">
              <div class="row">
                    <div class="col-lg-6 mx-auto ">
                        <h2 class="text-white mb-4" style="font-size: 65px;">Location</h2>
                        <center><img src="assets/img/location.jpg" class="mb-4" width="300px;"></center>
                        <p class="text-white-50 mb-4" style="font-size: 20px;">
                            Pandean Dua, Taji, Prambanan, Kalten, Jawa Tengah, 57454</b>.<br>
                            Open Hour : 09.00 AM - 05.00 PM</b>. <br>
                            Available : Takeaway or Dine-in <br>
                            Telp/Wa : 0852-9219-7466
                        </p>
                         
                    </div>
                    <div class="col-lg-6 mx-auto text-center">
                      <iframe class="mt-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.343049381199!2d110.5074053140391!3d-7.753392194411829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5bb5bc1914b3%3A0x2db9703b7d2a7381!2sRara%20Bakery%20-%20Little%20Meal%20Bento!5e0!3m2!1sid!2sid!4v1612343839326!5m2!1sid!2sid" width="450" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                     </div>
                </div>
          </div>
        </section>


</body>
</html>