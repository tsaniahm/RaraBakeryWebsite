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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger " href="account.php"><img src="assets/icons/close.png" style="width: 30px;"></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        	<?php 

        	$id = $_GET['id'];

        	if($id == 'tambah'){

        	 ?>
		<section>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="ProductUpload.php" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" name="name" class="form-control" id="name"  required="" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <input type="text" name="description" class="form-control" id="description"  placeholder="" required="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="" required="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">kategori</label>
                           <select name="category" id="kategori">
                            <option value="kue">kue</option>
                            <option value="snack">snack</option>
                            <option value="roti">roti</option>
                           
                          </select>
                          </div>
                          <div class="form-group">
                          	<label for="exampleInputPassword1">Gambar</label><br>
                            <input type="file" name="foto" class="" id="foto" placeholder="" required="">
                          </div>
                          <button type="submit" name="submit" class="btn btn-army">Upload</button>
                           <a href="account.php" class="btn btn-black-outer">Batal</a>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
        </section>
    <?php }else if ($id == 'cek') { ?>
    	<div class="table ms-sm-5 me-sm-1 text-center mt-sm-4" style="max-width: 1200px;">
		<div class="row mb-4">
			<div class="col-md-3 font-weight-bold">Nama Produk</div>
			<div class="col-md-3 font-weight-bold">Deskripsi</div>
			<div class="col-md-2 font-weight-bold">Harga</div>
			<div class="col-md-2 font-weight-bold">Kategori</div>
			<div class="col-md-2 font-weight-bold">Hapus/Edit</div>
		</div>

		<?php 
			
			include 'koneksi.php';
			$query = mysqli_query($konek, "SELECT * from product");
			while ($d=mysqli_fetch_array($query)) {
		?>

		<div class="row mb-3">
			<div class="col-md-3"><?php echo $d['name']; ?></div>
			<div class="col-md-3"><?php echo $d['description']; ?></div>
			<div class="col-md-2"><?php echo $d['price']; ?></div>
			<div class="col-md-2"><?php echo $d['category']; ?></div>
			<div class="col-md-2">
				<div class="row">
					<div class="col-md-6"> 
            <form action="ProductUpload.php?id=<?php echo $d['id']?>" method="POST">
              <button type="submit" name="submithapus" class="btn btn-army">Hapus</button>
            </form>
          </div>
					<div class="col-md-6"> 
            <form action="adminpage.php?id=edit&&id_product=<?php echo $d['id']?>" method="POST">
              <button type="submit" name="submitedit" class="btn btn-army">Edit</button>
            </form>
          </div>
				</div>
			</div>
			<hr>
			</div>
			
			<?php 
			}
			?>
		

		</div>

  <?php  }elseif ($_GET['id'] == 'edit') { ?>

    <section>
        <?php 
        include 'koneksi.php';
        $id_product = $_GET['id_product']; 
        $query = mysqli_query($konek,"SELECT * FROM product WHERE id='$id_product'");
        $d = mysqli_fetch_array($query);
        ?>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="ProductUpload.php?id=<?php echo $_GET['id_product']?>" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" name="name" class="form-control" id="name"  required="" value="<?php echo $d['name']; ?>" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <input type="text" name="description" class="form-control" id="description"  placeholder="" required="" value="<?php echo $d['description']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="" required="" value="<?php echo $d['price']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">kategori</label>
                           <select name="category" id="kategori">
                            <option value="<?php echo $d['category']; ?>" selected=""><?php echo $d['category']; ?></option>
                            <option value="kue">kue</option>
                            <option value="snack">snack</option>
                            <option value="roti">roti</option>
                           
                          </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Gambar</label><br>
                            <input type="file" name="foto" class="" id="foto" placeholder="" required="">
                          </div>
                          <button type="submit" name="submitedit" class="btn btn-army">Change</button>
                           <a href="adminpage.php?id=cek" class="btn btn-black-outer">Batal</a>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
        </section>
    
  <?php } ?>


</body>