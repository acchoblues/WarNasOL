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
<?php include "head.php";?>
<body>
    
	<?php include "header.php"; ?>
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-usd ico-white"></i>Cart</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">
 <?php
             if(isset($_GET['aksi']) == 'delete'){
				$id = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM cart WHERE kode='$id' AND session='$_SESSION[user_id]'");
                $data = mysqli_fetch_array($cek);
                $moq = $data['qty'];
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM cart WHERE kode='$id' AND session='$_SESSION[user_id]'");
					if($delete){
					    $less_produk = mysqli_query($koneksi, "UPDATE produk SET stok=(stok+'$moq') WHERE kode='$id'");
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
            
 <?php
             if(isset($_GET['add']) == 'add'){
				$id_add = $_GET['kd1'];
                $qty = 1;
				$cek1 = mysqli_query($koneksi, "SELECT * FROM cart WHERE kode='$id_add' AND session='$_SESSION[user_id]'");
				$test = mysqli_fetch_array($cek1);
                $harga = $test['harga'];
                $quan = $test['qty'];
                $qtot = $qty + $quan;
                $jum = $harga * $qtot;
                if(mysqli_num_rows($cek1) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$add = mysqli_query($koneksi, "UPDATE cart SET qty=(qty+'$qty'), jumlah='$jum' WHERE kode='$id_add' AND session='$_SESSION[user_id]'");
					if($add){
					    $add_produk = mysqli_query($koneksi, "UPDATE produk SET stok=(stok-'$qty') WHERE kode='$id_add'");
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Qty Produk berhasil ditambah</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Qty produk gagal ditambah !</div>';
					}
				}
			}
			?>
            
 <?php
             if(isset($_GET['less']) == 'less'){
				$id_less = $_GET['kd2'];
                $qty1 = 1;
				$cek2 = mysqli_query($koneksi, "SELECT * FROM cart WHERE kode='$id_less' AND session='$_SESSION[user_id]'");
				$test1 = mysqli_fetch_array($cek2);
                $harga1 = $test1['harga'];
                $quan1 = $test1['qty'];
                $qtot1 = $quan1 - $qty1;
                $jum1 = $harga1 * $qtot1;
                if(mysqli_num_rows($cek2) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$less = mysqli_query($koneksi, "UPDATE cart SET qty=(qty-'$qty1'), jumlah='$jum1' WHERE kode='$id_less' AND session='$_SESSION[user_id]'");
					if($less){
					    $less_produk = mysqli_query($koneksi, "UPDATE produk SET stok=(stok+'$qty1') WHERE kode='$id_less'");
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Qty Produk berhasil dikurangi.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Qty Produk gagal dikurangi !</div>';
					}
				}
			}
			?>
			<!-- start: Table -->
            <div class="title"><h3>Keranjang Belanja</h3></div>
<table class="table table-hover table-condensed">
<tr>
					<th><center>Nomor PO</center></th>
                    <th><center>Kode</center></th>
					<th><center>Nama Makanan</center></th>
						<th><center>Price</center></th>
				  <th><center>Quatity</center></th>
					<th><center>Sub Total</center></th>
					<th><center>Quantity Option</center></th>
				</tr>
			    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
               
    
    //mysql_select_db($database_conn, $conn);
		   
         
                    $sql = mysqli_query($koneksi, "SELECT * FROM cart WHERE session='$_SESSION[user_id]'");
                    $no = 0;
                    while($data = mysqli_fetch_array($sql)){
                    $no++; 
            ?>
            
                <tr>
                <td><center><?php echo $no; ?></center></td>
                <td><center><?php echo $data['kode']; ?></center></td>
                <td><center><?php echo $data['nama']; ?></center></td>
				  <td><center>Rp. <?php echo number_format($data['harga']); ?></center></td>
                <td><center><?php echo number_format($data['qty']); ?></center></td>
                <td><center>Rp. <?php echo number_format($data['jumlah']); ?></center></td>
                <td><center><a href="detail.php?add=add&kd1=<?php echo $data['kode']; ?>" class="btn btn-xs btn-success">Add</a> <a href="detail.php?less=less&kd2=<?php echo $data['kode']; ?>" class="btn btn-xs btn-warning">Less</a> <a href="detail.php?aksi=delete&kd=<?php echo $data['kode']; ?>" class="btn btn-xs btn-danger">Delete</a></center></td>
                </tr>
                
					
                         <?php
                         }
                         $sqlku = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total FROM cart WHERE session='$_SESSION[user_id]'");
                         $dataku = mysqli_fetch_array($sqlku);
                         $total = $dataku['total'];
				if($total == 0){
					echo '<tr><td colspan="5" align="center">Cart Empty!</td></tr></table>';
					echo '<p><div align="right">
						<a href="produk.php" class="btn btn-primary btn-lg">&laquo; Continue Shopping</a>
						</div></p>';
				} else {
					echo '
						<tr style="background-color: #DDD;"><td colspan="6" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						<a href="produk.php" class="btn">&laquo; CONTINUE SHOPPING</a>
						<a href="checkout2.php?total='.$total.'" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT &raquo;</a>
						</div></p>
					';
				}
				
					
				
				?>

</table>
			
				
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
						<a href="#"><img src="../img/logo3.png" alt="logo" /></a>
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
<script src="../js/jquery-1.8.2.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/flexslider.js"></script>
<script src="../js/carousel.js"></script>
<script src="../js/jquery.cslider.js"></script>
<script src="../js/slider.js"></script>
<script defer="defer" src="../js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>