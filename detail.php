<?php require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
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

			<!-- start: Table -->
            <div class="title"><h3>Shopping Cart Details</h3></div>
<table class="table table-hover table-condensed">
<tr>
					<th><center>Pruchase Number</center></th>
                    <th><center>Item Code</center></th>
					<th><center>Item Name</center></th>
					<th><center>Ukuran</center></th>
						<th><center>Price</center></th>
				  <th><center>Quatity</center></th>
					<th><center>Sub Total</center></th>
					<th><center>Quantity Option</center></th>
				</tr>
			    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
               
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
		   
        $query = mysqli_query($koneksi, "select produk.kode, produk.nama, produk.harga, produk.size, produk.color  from produk where produk.kode = '$key'");
		 
		 $data = mysqli_fetch_array($query);
		
            $jumlah_harga = $data['harga'] * $val;
            $total += $jumlah_harga;
            $no=1;
		
                 
			
            ?>
            
                <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $data['kode']; ?></center></td>
                <td><center><?php echo $data['nama']; ?></center></td>
				 <td><center><?php echo $data['size']; ?></center></td>
				  <td><center><?php echo number_format($data['harga']); ?></center></td>
                <td><center><?php echo number_format($val); ?></center></td>
                <td><center><?php echo number_format($jumlah_harga); ?></center></td>
                <td><center><a href="cart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-success">Add</a> <a href="cart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-warning">Less</a> <a href="cart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-danger">Delete</a></center></td>
                </tr>
                
					<?php
					
					
						}
							//$total += $sub;
						}?>  
                         <?php
				if($total == 0){
					echo '<tr><td colspan="5" align="center">Cart Empty!</td></tr></table>';
					echo '<p><div align="right">
						<a href="produk.php" class="btn btn-primary btn-lg">&laquo; Continue Shopping</a>
						</div></p>';
				} else {
					echo '
						<tr style="background-color: #DDD;"><td colspan="4" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						<a href="produk.php" class="btn">&laquo; CONTINUE SHOPPING</a>
						<a href="checkout.php?total='.$total.'" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT &raquo;</a>
						</div></p>
					';
				}
				
					
					//$kode = $data['kode'];
				//	$nama = $data['nama'];
			//		$size = $data['size'];		  
			//	$query1 = mysqli_query($koneksi, "INSERT INTO tmp_po_terima ( kode, tanggal, style, color, size, qty, total) VALUES ('$kode', CURRENT_DATE, '0','0','$size' , '$val', '$jumlah_harga')") or die(mysqli_error());
      
                    //mysql_free_result($query);	
 //if ($query1) {	
//} 

				
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
<!-- end: Java Script -->

</body>
</html>