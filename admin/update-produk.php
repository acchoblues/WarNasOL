<?php
include "../conn.php";
if(isset($_POST['update'])){
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
			$sql="UPDATE produk SET nama='$nama', jenis='$jenis', harga='$harga', keterangan='$keterangan', stok='$stok' WHERE kode='$kode'" or die(mysqli_error());
			$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			//echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data Prroduk berhasil diupdate!'); window.location = 'produk.php'</script>";	   
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