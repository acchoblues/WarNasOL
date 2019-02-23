 <?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
        
            //input po transit dan tampil ke tabel
            if(isset($_GET['kd'])){
                $kd = $_GET['kd'];
                $sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode='$kd'");
             if(mysqli_num_rows($sql) == 0){
				echo "<script>window.location = 'javascript:history.back()'</script>";
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
                $kode        = $row['kode'];
                $nama        = $row['nama'];
                $harga       = $row['harga'];
                $stock       = $row['stok'];
                $qty         = 1;
                $jumlah      = $harga * $qty;
                $session     = $_SESSION['user_id'];
                $tanggal     = date("Y-m-d H:i:s");
                 
        
        // masukkan dalam tabel penjualan
        
        $nomor = date("YmdHis");
		      
				if ($stock == 0) {
		          echo "<script>alert('Stock Habis, silahkan pilih produk lain!'); window.location = 'javascript:history.back()'</script>";
	                } else {
                
						$insert = mysqli_query($koneksi, "INSERT INTO cart(id_cart, tanggal, kode, nama, harga, qty, jumlah, session)
						                                  VALUES('$nomor', '$tanggal', '$kode', '$nama', '$harga', '$qty', '$jumlah', '$session');") or die(mysqli_error());
						
                         if($insert){
                          $qu			= mysqli_query($koneksi, "UPDATE produk SET stok=(stok-'$qty') WHERE kode='$kode'");
                       
						         echo "<script>alert('Produk ditambahkan ke keranjang!'); window.location = 'javascript:history.back()'</script>";   
                                    //}
                        }else{
						echo "<script>alert('Gagal Input!'); window.location = 'javascript:history.back()'</script>";
	              	
                          	}
                    }
			} 
   		
} 
            ?>