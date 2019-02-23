<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body>
    
	<?php include "header.php"; ?>
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-user ico-white"></i>Registrasi Customer Baru</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">

			<!-- start: Table -->
            <?php
            include "conn.php";
            	if(isset($_POST['input'])){
				 $nama       = $_POST['nama'];
		         $alamat     = $_POST['alamat'];
                 $no_telp    = $_POST['no_telp'];
                 $username   = $_POST['username'];
                 $password1  = $_POST['password'];
                 $password  = sha1($password1);
                 $kd_cus     = date("YmdHis");
				
                
				$cek = mysqli_query($koneksi, "SELECT * FROM customer WHERE nama='$nama'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO customer (kd_cus, nama, alamat, no_telp, username, password) VALUES ('$kd_cus', '$nama', '$alamat', '$no_telp', '$username', '$password')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Member Sudah Ada..!</div>';
				}
			} ?>
                 <div class="table-responsive">
                 <div class="title"><h3>Form Registrasi</h3></div>
                 <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!
                 <p></p> Setelah form terisi selanjutnya Login sebagai Customer !</div>
    <form role="formku" id="formku" method="post" action="">
    <table class="table table-hover">
    <tr>
        <td><label for="nama">Nama</label></td>
        <td><input name="nama" type="text" class="required" minlength="3" id="nama" size="200" /></td>
      </tr>
      <tr>
        <td><label for="alamat">Alamat</label></td>
        <td><input name="alamat" type="text" class="required" minlength="5" id="alamat" /></td>
      </tr>
      <tr>
        <td><label for="no_telp">No Telepon</label></td>
        <td><input name="no_telp" type="text" class="required" minlength="5" id="no_telp" /></td>
      </tr>
      <tr>
        <td><label for="username">Username</label></td>
        <td><input name="username" type="text" class="required" id="username" /></td>
      </tr>
      <tr>
        <td><label for="password">Password</label></td>
        <td><input name="password" type="password" class="required" id="password" /></td>
      </tr>
      <!-- <tr>
      <td><label for="foto">Foto Profile</label></td>
      <td><input name="nama_file" type="file" id="nama_file" class="form-control" required /></td>
      </tr>  -->                  
      <tr>
      <td></td>
        <td><input type="submit" value="Submit" name="input" id="input" class="btn btn-sm btn-success"/>&nbsp;<a href="index.php" class="btn btn-sm btn-warning">Back</a></td>
        </tr>
    </table>
    </form>
                   </div>
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
						<a href="#"><img src="img/logo3.png" alt="logo" /></a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="span9">
					
					<div id="footer-menu-links">

						<ul id="footer-nav">

							<li><a href="#">Free Delivery Max 5 KM</a></li>

							<li><a href="#">Cash On Delivery (COD)</a></li>

							<li><a href="#">Pelayanan Cepat</a></li>

						</ul>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<?php include "footer.php"; ?>

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script def src="js/custom.js"></script>

<script src="jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
    
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
    </style>
<!-- end: Java Script -->

</body>
</html>