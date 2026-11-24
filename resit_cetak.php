<?PHP 
# memulakan fungsi session
session_start();
# memanggil fail fpdf.php dan fail connection.php 
require('fpdf.php'); 
require('connection.php');

# mengambil data get 
$data_get= array(
    'KodRumah'=>$_GET['KodRumah'],
    'KategoriRumah' =>$_GET['KategoriRumah'], 
    'Harga'=>$_GET['Harga'],
    'gambar' =>$_GET['gambar'], 
    'masuk'=>$_GET['masuk'],
    'keluar'=>$_GET['keluar'],
    'BilanganHari'=>$_GET['BilanganHari']
);
    
class PDF extends FPDF{
  # fungsi header bagi memaparkan maklumat pada header resit 
  function Header(){
      $tarikh=date("d/m/Y");
      $this->setFont('Arial', 'B',16); 
      $title="D'HARI HOME"; 
      $subtitle="Jalan Hang Tuah, 13000 Klebang, Melaka"; 
      $datetitle="Dicetak pada : ".$tarikh; 
      $this->Cell(100,5,$title,0,1); 
      $this->Ln(1);
      $this->setFont('Arial','I',9); 
      $this->Cell(100,5,$subtitle,0,1); 
      $this->setFont('Arial','',9); 
      $this->Cell(100,5,$datetitle,0,1);
}
  # fungsi footer bagi memaparkan maklumat pada footer 
  function Footer() {
      $this->SetY(-15); 
      $this->setFont('Arial', 'B',8); 
      $this->Cell(0,10,'Muka Surat '.$this->PageNo()." / {pages}",0,0,'C');
  }
}
$pdf = new PDF('P','mm', 'A4');
$pdf ->AliasNbPages('{pages}'); 
$pdf -> AddPage(); 
$pdf -> SetFont('Arial','',12);

//Cell(width, height, text, border, endline, [align])

$pdf ->SetFont('Arial','',10); 
$pdf ->SetDrawColor(50,50,100); 
$pdf ->Ln(1);

$pdf ->Ln(4); 
$pdf ->SetFillColor (200,220,255); 
$pdf->Cell(0,5, 'Butiran Tetamu',0,0, 'L', true);
$pdf ->Ln(4);

$pdf ->Ln(4); 
$pdf ->Cell(25,5, 'Nama Tetamu :',0,0,'R'); 
$pdf ->Cell(30,5,$_SESSION['NamaPelanggan'],0,0); 
$pdf ->Ln(4); 
$pdf ->Cell(25,5, 'Nokp :',0,0, 'R'); 
$pdf ->Cell(30,5,$_SESSION['NoKP' ],0,0);
$pdf ->Ln(4);
$pdf ->Cell(25,5,'No Telefon :',0,0,'R');
$pdf ->Cell(30,5, $_SESSION['NoTel'],0,0); 
$pdf ->Ln(4);
$pdf ->Cell(25,5,'Alamat Rumah :',0,0,'R');
$pdf ->Cell(30,5, $_SESSION['Alamat'],0,0); 
$pdf ->Ln(4);


$pdf ->Ln(4);
$pdf ->SetFillColor (200,220, 255);
$pdf ->Cell(0,5, 'Butiran Tempahan',0,0,'L', true);
$pdf ->Ln(4);

$pdf ->Ln(3);
$pdf ->Cell(25,5, 'No Rumah :',0,0, 'R');
$pdf ->Cell(30,5,$data_get['KodRumah'],0,0); 
$pdf ->Cell(80); 
$pdf ->Cell(25,5, 'Tarikh Masuk :',0,0,'R');
$pdf ->Cell(30,5, $data_get['masuk'],0,0);
$pdf ->Ln(4);

$pdf ->Cell(80); 
$pdf ->Cell(25,5, 'Tarikh Keluar :',0,0,'R'); 
$pdf ->Cell(30,5,$data_get['keluar'],0,0);
$pdf ->Ln(4);

$pdf ->Cell(25,5, 'Kategori Rumah :',0,0,'R'); 
$pdf ->Cell(30,5,$data_get['KategoriRumah'],0,0); 
$pdf ->Cell(80); 
$pdf ->Cell(25,5, 'Harga Semalam :',0,0,'R'); 
$pdf ->Cell(30,5,"RM".$data_get['Harga'],0,0); 
$pdf ->Ln(4);

$pdf ->Cell(25,5, 'Bilangan Hari :',0,0, 'R'); 
$pdf ->Cell(30,5, $data_get['BilanganHari'],0,0);
$pdf ->Cell(80); 
$pdf ->SetFillColor (200,220,255);
$JumlahBayaran=$data_get['Harga'].$data_get['BilanganHari'];
$pdf ->Cell(25,5, 'Jumlah Bayaran :',0,0,'R'); 
$pdf ->Cell(0,5,"RM $JumlahBayaran",0,0, 'L', True);
$pdf ->Ln(5); 
$pdf ->Cell(25,5,' ',0,0,'R'); 
$pdf ->Cell(30,5," ",0,0); 
$pdf ->Cell(80);

$pdf ->Cell(25,5, 'Pembayaran :',0,0,'R');
$pdf ->Cell(0,5, "CARD",0,0, 'L');
$pdf ->Ln(4);

$pdf ->Cell(25,1,'______________________________________________________________________________________',0,0,'L');
                                   
$pdf ->Ln(170);
$pdf ->setFillcolor (230,82,9);
$pdf ->Cell(0,5, 'Pastikan anda membawa resit ini semasa mendaftar bagi memudahkan pendaftaran masuk',0,0,'C'.True);

$pdf ->SetAutoPageBreak(true, 15);
$pdf ->Output();
?>put();
?>