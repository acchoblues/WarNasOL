<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
require('../fpdf17/fpdf.php');
require('../conn.php');

$kodesaya = $_GET['kd'];
//Select the Products you want to show in your PDF file
//$result=mysqli_query($koneksi, "SELECT * FROM po_terima where id like '%$kodesaya%' ");
$result=mysqli_query($koneksi, "SELECT po_terima.*, konfirmasi.jumlah, produk.kode AS kode_prod, produk.nama, produk.harga, customer.alamat, customer.no_telp, customer.nama AS nama_cus, po.status FROM po_terima
				LEFT JOIN produk ON po_terima.kode = produk.kode
				LEFT JOIN customer ON po_terima.kd_cus = customer.kd_cus
                LEFT JOIN po ON po_terima.nopo = po.nopo
                LEFT JOIN konfirmasi ON konfirmasi.nopo = po_terima.nopo
				WHERE po_terima.nopo='$_GET[kd]'") or die(mysqli_error());

//Initialize the 3 columns and the total
$column_date = "";
$column_time = "";
$column_standmeter = "";
$column_factor = "";
$column_total = "";
$column_nilai = "";
$column_rata = "";
$column_test = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$nopo    = $row["nopo"];
    $kd_cus  = $row["kd_cus"];
    $kode    = $row["kode"];
    $tanggal = $row["tanggal"];
    $qty     = $row["qty"];
    $total   = number_format($row['jumlah'],0,",",".");
    $nama    = $row["nama"];
    $harga   = number_format($row['harga'],0,",",".");
    $harga1   = $row['harga'];
    $no_telp = $row["no_telp"];
    $status  = $row["status"];
    $nama_cus=$row['nama_cus'];
    $alamat  =$row['alamat'];
    $kode_prod=$row['kode_prod'];
    $sub = $qty * $harga1;
    $subtot = number_format($sub,0,",",".");
    $rupiah = "Rp.";
    $column_test = $column_test.$kode_prod."\n";
	$column_date = $column_date.$nama."\n";
	$column_total = $column_total.$qty."\n";
    $column_nilai = $column_nilai.$harga."\n";
    $column_rata = $column_rata.$subtot."\n";		


//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../img/logo1.png',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'STRUK BELANJA',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'Warung Sunda Ibu Nana',0,0,'C');
$pdf->Ln();

//Fields Name position
$Y_Fields_Name_position = 40;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(80,8,'No: '.$nopo,0,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 48;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Customer : '.$nama_cus,0,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 56;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(200,8,'Alamat : '.$alamat,0,0,'L',1);
$pdf->SetX(205);
/**$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);**/
//$pdf->Cell(45,8,'Tanggal Beli : '.$tanggal,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 64;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'No Telepon : '.$no_telp,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(45,8,'Tanggal Beli : '.$tanggal,0,0,'R',1);
$pdf->Ln();
}
//Fields Name position
$Y_Fields_Name_position = 71;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Kode',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(60,8,'Makanan',1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(20,8,'Qty',1,0,'C',1);
$pdf->SetX(125);
$pdf->Cell(40,8,'Price',1,0,'C',1);
$pdf->SetX(165);
$pdf->Cell(40,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 79;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(40,6,$column_test,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(60,6,$column_date,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(20,6,$column_total,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(40,6,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(40,6,$column_rata,1,'C');

//Footer Table
$pdf->SetFillColor(110,180,230);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(5);
$pdf->Cell(40,8,'Total Tagihan',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(160,8,$rupiah.$total.'',1,0,'R',1);
$pdf->Ln();
$pdf->SetFillColor(110,180,230);
$pdf->Ln(10);

//After Footer

//$Y_Fields_Name_position = 150;
//$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
/**$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Kepala Sekolah,',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 170;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Hakko Bio Richard, A.Md Kom',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();

/**$pdf->SetY(-55);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10);
$pdf->Cell(30,10,'PT. BBG',0,0,'C');
$pdf->Cell(105);
$pdf->Cell(30,10,'PT. BBRI',0,0,'C');
$pdf->Ln(20);
$pdf->Cell(10);
$pdf->Cell(30,10,'( ............................................................)',0,0,'C');
$pdf->Cell(107);
$pdf->Cell(30,10,'( ............................................................)',0,0,'C');
**/
$pdf->Output();
}
?>
