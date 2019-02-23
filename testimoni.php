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

				<h2><i class="ico-stats ico-white"></i>Buku Tamu</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container"> 
        <center><div class="title" style="margin-left: ;"><h3>Isi Testimonial untuk mendapatkan update produk terbaru kami.</h3></div></center>
            <form id="formku" method="post" action="proses.php" onsubmit="return formCheck(this);">
<table style="font-style: oblique; font-weight: bold; margin-left: 140px;">
<tr>
<td width="150">Nama</td>
<td width="30">:</td>
<td width="550"><input type="text" name="nama" size="30" class="required" minlength="3" placeholder="Nama Anda" /></td>
</tr>
<tr>
<td width="150">Email</td>
<td width="30">:</td>
<td width="550"><input type="text" name="email" size="30" class="required email" minlength="3" placeholder="Alamat Email" /></td>
</tr>
<tr>
<td width="150">Komentar</td>
<td width="30">:</td>
<td width="550"><input type="text" name="komentar" size="30" class="required" minlength="3" placeholder="Komentar Anda " /></td>
</tr>
<tr>
<td width="150"></td>
<td width="30"></td>
<td width="550">
<input class="button" type="submit" value="Kirim"/>
</td>
</tr>
</table>
</form>
</div>
<div class="komentar">
<?php
echo "<head><title>My Guest Book</title></head>";
$fp = fopen("guestbook.txt","r");
echo "<table border=0>";

while ($isi = fgets($fp,250))
{
$pisah = explode("|",$isi);
echo "<tr><td>$pisah[0], $pisah[1]</td></tr>";
echo "<tr><td><font color=red>$pisah[2]</font>, Bilang</td></tr>";
echo "<tr><td>$pisah[4]</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
}
echo "</table>"; 
?>
</div>
</div>
<div class="konten">

</div>
</div>
		</div>
		<!--end: Container-->
				
		<!--start: Container -->
    	<div class="container">	
      		
			<hr>
		
			<!-- start Clients List
			<div class="clients-carousel">
		
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
			 end Clients List -->
		
					
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
    
    <script type="text/javascript">
    x=0;
    $(document).ready(function(){
       $(".komentar").scroll(function(){
        $("span").text(x+=1);
       }); 
    });
    </script>
<!-- end: Java Script -->

</body>
</html>	