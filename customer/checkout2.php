<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";

        $a = "Belum";
        $b = $_GET['total'];
        $c = date("Y-m-d H:i:s");
        $d = "Cash On Delivery (COD)";
        //$nopo = date("dmYHis");
        $query1 = mysqli_query($koneksi, "INSERT INTO konfirmasi (nopo, kd_cus, bayar_via, tanggal, jumlah, bukti_transfer, status) VALUES ('$_SESSION[user_id]', '$_SESSION[user_id]', '$d', '$c', '$b', 0, '$a')") or die(mysqli_error());

        $input = mysqli_query($koneksi, "INSERT INTO po_terima(nopo, kd_cus, kode, tanggal, qty, total) SELECT session, session, kode, tanggal, qty, jumlah FROM cart WHERE session='$_SESSION[user_id]'") or die(mysqli_error());
                     
                      
        if ($query1 and $input) {
                                     
                    $delete = mysqli_query($koneksi, "DELETE FROM cart WHERE session='$_SESSION[user_id]'"); 
                    echo "<script>alert('Checkout Sukses, silahkan cetak invoice dan lakukan pembayaran..'); window.location = 'index1.php'</script>";
                
            } else {
                echo "<script>alert('Checkout Gagal !'); window.location = 'index.php'</script>";

            }
    
}
?>