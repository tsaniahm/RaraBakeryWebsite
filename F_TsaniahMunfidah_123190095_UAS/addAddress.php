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
	 <!-- Navigation-->
         <nav class="navbar navbar-expand-lg navbar-light  " id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger font-weight-bold" href="#page-top" style="font-size: 40px;">RARA BAKERY</a>
            </div>
        </nav>

        <section>
            <h1 class="text-center" style="font-family: times;"> Add Your Address</h1>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="addAddressProsses.php" method="POST">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Detail Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputPassword1" required="" placeholder="ex: Jl.Dewa No5, Keby Baru (55512), Jakarta Selatan">
                          </div>
                          <button type="submit" name="submitsignup" class="btn btn-army" style="width: 80px;">SAVE</button>
                          <a href="account.php" class="btn btn-black-outer">CANCEL</a>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
        </section>

</body>
</html>