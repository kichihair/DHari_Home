<?PHP 
# Memulakan fungsi Session
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
# Mendapatkan tarikh hari ini dan esok
$TarikhMasuk=date("Y-m-d");
$TarikhKeluar=date('Y-m-d', strtotime(' +1 day'));

#----------------- Bahagian login & logout Session ------------
$namafail = basename($_SERVER['PHP_SELF']); if(($namafail !='index.php' and $namafail !='tempahan_bayar.php' and $namafail !='tempahan_senarai.php' and $namafail !='pelanggan_daftar.php' and $namafail !='pelanggan_login.php') and empty($_SESSION['NamaPelanggan']))
{
    die("<script>alert('Sila Daftar Masuk');window.location.href='logout.php'</script>");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Homestay</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="style/w3.css">
</head>
<body>
<div class='w3-row w3-container w3-indigo '>
    <h2 ><b>D'HARI HOME</b></h2>
    <p >Jalan Hang Tuah, 13500 Klebang, Melaka</p>
</div>
<?PHP
# Link Ke Laman utama
echo"<div class='w3-bar w3-dark-grey w3-mobile'>
<a href='index.php' class='w3-bar-item w3-button w3-mobile'>Laman Utama</a> ";
# menyemak kewujudan session nama_pelanggan (jika telah login,maka session ini akan ada nilai)
if(empty($_SESSION["NamaPelanggan"]))
  {
    # papar Link untuk login dan daftar pengguna baru jika pengguna masih belum login
    echo"<div class='w3-dropdown-hover '>
    <a href class='w3-button w3-dark-grey'>Pengguna</a>
    <div class='w3-dropdown-content w3-bar-block w3-border'>
      <a href='pelanggan_daftar.php' class='w3-bar-item w3-sand w3-button'>
Daftar Pengguna</a>
      <a href='pelanggan_login.php' class='w3-bar-item w3-sand w3-button'>Daftar Masuk</a>
    </div>
  </div>";
  }
  else
  {
     # papar link logout & link senarai_tempahan jika pengguna telah login
    echo"
    <a href='logout.php' class='w3-bar-item w3-button w3-right w3-margin-right w3-light-blue'>
Log Keluar</a>
    <a href='pelanggan_senarai_tempahan.php' class='w3-bar-item w3-button w3-right
w3-margin-right'> ".$_SESSION['NamaPelanggan']."</a>";
  }
  echo "</div>";
?>