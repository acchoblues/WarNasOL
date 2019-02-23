<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- start: Meta -->
  <meta charset="utf-8">
  <title>Sablon DTG Bekasi</title> 
  <meta name="description" content="Website, Corporate, Bekasi, Garment, Sablon, Konveksi"/>
  <meta name="keywords" content="Bahan, Pakaian, Baju, Sablon" />
  <!-- end: Meta -->
  
  <!-- start: Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- end: Mobile Specific -->
  
  <!-- start: Facebook Open Graph -->
  <meta property="og:title" content=""/>
  <meta property="og:description" content=""/>
  <meta property="og:type" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:image" content=""/>
  <!-- end: Facebook Open Graph -->

    <!-- start: CSS --> 
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
  <!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
  <?php include "header.php"; ?>
  
  <!-- start: Slider -->
  <div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><i class="ico-stats ico-white"></i>Custom Desain Anda</h2>

      </div>
      <!-- end: Container  -->

    </div>  

  </div>
  <!-- end: 
  <!-- end: Slider -->
      
  <!--start: Wrapper-->
  <div id="wrapper">
        
    <!--start: Container -->
      <div class="container">
      <!-- start: Table -->
            <div class="title"><h3>Cara Upload Gambar Untuk Desain Custom</h3></div>

  <div id="wrapper">
        
    <!--start: Container -->
      <div class="container">
  
          <!-- start: Hero Unit - Main herounit for a primary marketing message or call to action -->

            <blockquote style="font-size: medium;">
            <b></b>
            
            Untuk mengupload desain gambar sesuai keinginan anda. Kalian bisa mengupload gambar pada web ini. Untuk desain yang bisa di custom gambar hanya untuk Kaos(T-shirt). <br/> <br />
            </blockquote>
            <!--<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            </div> -->
      <!-- end: Hero Unit -->

          <!-- start: Row -->
            
          
      <!-- end: Row -->
          
    <!--  <hr>
    
      <!-- start Clients List --> 
    <!--  <div class="clients-carousel">
    
        <ul class="slides clients">
          <li><img src="img/logos/1.png" alt=""/></li>
          <li><img src="img/logos/2.png" alt=""/></li>  
          <li><img src="img/logos/3.png" alt=""/></li>
          <li><img src="img/logos/4.png" alt=""/></li>
          <li><img src="img/logos/5.png" alt=""/></li>
          <li><img src="img/logos/6.png" alt=""/></li>
          <li><img src="img/logos/7.png" alt=""/></li>
          <li><img src="img/logos/8.png" alt=""/></li>
          <li><img src="img/logos/9.png" alt=""/></li>
          <li><img src="img/logos/10.png" alt=""/></li>   
        </ul>
    
      </div>
      <!-- end Clients List -->
<?php
/** if(isset($_POST['input'])){
$namafolder="gambar_produk/"; //tempat menyimpan file

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
  $jenis_gambar=$_FILES['nama_file']['type'];
        $kode       = $_POST['kode'];
    $nama       = $_POST['nama'];
    $jenis      = $_POST['jenis'];
        $harga      = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        $stok       = $_POST['stok'];
      
  if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
  {     
    $gambar = $namafolder . basename($_FILES['nama_file']['name']);   
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
      $sql="INSERT INTO produk(kode,nama,jenis,harga,keterangan,stok,gambar) VALUES
            ('$kode','$nama','$jenis','$harga','$keterangan','$stok','$gambar')";
	
  
      $res=mysqli_query($koneksi, $sql and $query) or die (mysqli_error());
      //echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data Produk berhasil dimasukan!'); window.location = 'produk.php'</script>";    
    } else {
       echo "<p>Gambar gagal dikirim</p>";
    }
   } else {
    echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
  echo "Anda belum memilih gambar";
}
}

**/
      ?>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Input Data Produk Custom </h3> <br/> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="input_custom.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <table class="table table-hover table-striped">
						  <tr>
                            <td><label class="col-sm-2 col-sm-2 control-label">Name </label></td>
							<td> <input name="nama" type="text" id="nama" class="form-control" autocomplete="off" placeholder="Nama Anda" autocomplete="off" required />
                           </td>
                            </tr>
                        <tr>
                              <td>
                            <label class="col-sm-2 col-sm-2 control-label">Size</label>
                              </td>
                              <td>
                            <select id="size" name="size" class="form-control" required>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                            <option value="XXXL">XXXL</option>
                            </select>
                              
                            </td>
                          </tr>
                          <tr>
                          <td>
                              <label class="col-sm-2 col-sm-2 control-label">Color</label>
                          </td>
                          <td>
                            <select id="color" name="color" class="form-control" required>
                            <option value="black">Black</option>
                            <option value="dark blue">Dark Blue</option>
                            <option value="red">Red</option>
                            <option value="grey">Grey</option>
                            <option value="white">White</option>
                            </select>
                            </td>
                            </tr>
                            <tr>
                          <td>
                              <label class="col-sm-2 col-sm-2 control-label">Model</label>
                              </td>
                              <td>
                            <select id="model" name="model" class="form-control" required>
                            <option value="short">Short Sleeve</option>
                            <option value="long">Long Sleeve</option>
                            
                            </select>
                          </td>
                          </tr>
                          <tr>
                         <td>
                              <label class="col-sm-2 col-sm-2 control-label">Gambar Custom</label>
                         </td>
                         <td>
                            <input name="myFile" type="file" id="myFile" class="form-control" required />
                           </td>
                          </tr>
                         <tr>
                         <td>
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              </td>
                              <td>
                                  <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                             </td>
                         </tr>
                           </table>
                      </form>
                  </div>
                  </div>
                  </div>
              </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

      <hr>
      
      
        </div>
        <!-- end: Icon Boxes -->
        <div class="clear"></div>
      </div>
      <!-- end: Row -->
      
      <hr>
      
    </div>
    </div>
    <!--end: Container-->
  
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

              <li><a href="#">Kemeja</a></li>

              <li><a href="#">Kaos</a></li>

              <li><a href="#">Sweater</a></li>

              <li><a href="#">Jacket</a></li>
              
              <li><a href="#">Kaos Kerah (polo t-shirt)</a></li>

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


</body>
</html>