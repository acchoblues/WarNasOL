<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
    }
		
		$tmp_file = $_FILES["myFile"]["tmp_name"];
        $filename = $_FILES["myFile"]["name"];
		$success= move_uploaded_file($tmp_file , "../custom/". $filename);
		
		 $nama       = $_POST['nama'];
		  $size = $_POST['size'];
		    $color = $_POST['color'];
			  $model = $_POST['model'];
		if (!$success ) { 
            echo '<div class="alert alert-warning">Gagal upload file.</div>';
            exit;
          }else{

        
          }
	
	$query = mysqli_query ($koneksi, "insert into custom (  kd_cus,nama, size, color, model, gambar) VALUES ('$_SESSION[user_id]','$nama','$size','$color', '$model',  '$filename')")
			or die (mysql_error());
	if ($query) {
	header('location:index.php');
}



?>