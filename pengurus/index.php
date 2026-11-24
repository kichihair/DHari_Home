<?PHP
# memulakan fungsi session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class='w3-row w3-container w3-indigo'>
    <h2 class=''><b>D'HARI HOME</b></h2>
    <p class=''>Jalan Hang Tuah, 13500 Klebang, Melaka</p>
</div>
<div class='w3-container w3-dark-grey'>
    <h5 class='w3-center '>Laman Pengurus</h5>
</div>
    
<div class='w3-row w3-margin'>
    <div class='w3-third w3-container'></div>
    <div class='w3-third w3-container'>
        <div class='w3-container w3-blue'>
            <h4>Sila Log Masuk</h4>
        </div>
        <div class='w3-container w3-card-2'>
            <p class='w3-margin-top w3-tiny'>
Sila Masukkan No Kad Pengenalan dan Kata Laluan</p>
            <form action='' method='POST'>
            <label>No Kad Pengenalan</label>
            <input class='w3-input w3-border ' type='text' name='nokp'>
            <label>Kata Laluan</label>
            <input class='w3-input w3-border ' type='password' name='katalaluan'>
<input class='w3-button w3-blue-grey w3-round-xlarge w3-margin-top w3-margin-bottom'
type='submit' value='Daftar Masuk'>
            </form>
        </div>
    </div>
    <div class='w3-third w3-container'></div>
</div>
    
<?PHP include('../footer.php'); ?>
    
<?PHP
# menyemak kewujudan data POST
if(!empty($_POST))
{
    # memanggil fail connection.php dari folde luaran
    include ('../connection.php');
    
    # mengambil data POST
    $nokp=$_POST['nokp'];
    $katalaluan=$_POST['katalaluan'];
    
    # menyemak data POST
    if( empty($nokp) or empty($katalaluan))
    {
        die("<script>alert('Sila lengkapkan maklumat tersebut');
window.history.back();</script>");
    }
# Arahan untuk memilih rekod di pangkalan data yang sepadan dengan data POST
$sql="select* from pengurus where nokp_pengurus='$nokp' and katalaluan='$katalaluan' limit 1";
    # melaksanakan arahan memilih rekod
    $laksana_query=mysqli_query($condb,$sql);
    # jika bilangan rekod yang ditemui == 1
    if(mysqli_num_rows($laksana_query)==1)
    {
        # login berjaya. ambil data dari rekod yang ditemui
        $rekod=mysqli_fetch_array($laksana_query);
        # umpukan kepada pembolehubah session
        $_SESSION['nama_pengurus']=$rekod['nama_pengurus'];
        $_SESSION['nokp_pengurus']=$rekod['nokp_pengurus'];
        # buka fail laman_utama.php
        header("location:laman_utama.php");
    }
    else
    {
        # login gagal. kembali ke page sebelumnya
        echo "<script>alert('Daftar masuk gagal'); window.history.back();</script>";
    }
}
?>