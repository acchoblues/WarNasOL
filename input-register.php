<?php
            if(isset($_POST['input'])){
include "conn.php";
$namafolder="admin/gambar_customer"; //tempat menyimpan file

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $nama       = $_POST['nama'];
		$alamat     = $_POST['alamat'];
        $no_telp    = $_POST['no_telp'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $kd_cus     = date("YmdHis");
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO customer (kd_cus, nama, alamat, no_telp, username, password, gambar) VALUES ('$kd_cus', '$nama', '$alamat', '$no_telp', '$username', '$password', '$filename')";
			$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			//echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data karyawan berhasil dimasukan!'); window.location = 'login.html'</script>";	   
		} else {
		   echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p>Gambar gagal dikirim</p></div>';
		}
   } else {
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Jenis gambar yang anda kirim salah. Harus .jpg .gif .png</div>';
   }
} 
}
			?>