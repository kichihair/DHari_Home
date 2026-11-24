<?PHP
# Memulakan fungsi session
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
# Menyemak nama fail semasa
$namafail = basename($_SERVER['PHP_SELF']);
# Menguji adakah fail semasa bukan index.php dan pembolehubah session tidak mempunyai nilai
if(empty($_SESSION['nama_pengurus']))
{
    die("<script>alert('Sila daftar masuk');
    window.location.href='../logout.php?id=pengurus'</script>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<!-- Tajuk Utama -->
<div class='w3-row w3-container w3-indigo'>
    <h2 class=' '><b>D'HARI HOME</b></h2>
    <p class=' '>Jalan Hang Tuah, 13500 Klebang, Melaka</p>
</div>
<!-- container untuk memaparkan butang untuk membesarkan saiz tulisan dalam jadual -->
<div class='w3-container w3-dark-grey'>
    <a href= '../logout.php' class= 'w3-bar-item w3-button w3-right w3-margin-right w3-light-blue'>Log Keluar</a>
    <input class= ' w3-button w3-border-bottom w3-mobile w3-light-blue w3-circle w3-left'
name='reSize1' type='button' value='reset' onclick="resizaText(2)" />
    <input class= ' w3-button w3-border-bottom w3-mobile w3-light-blue w3-circle w3-left'
name='reSize2' type='button' value='-A' onclick="resizeText(-1)" />
    <input class= ' w3-button w3-border-bottom w3-mobile w3-light-blue w3-circle w3-left'
name='reSize' type='button' value='+A' onclick="resizeText(1)" />

    
</div>
<!--row bahagian tengah ada 2 column quarter dan three quarter -->
<div class='w3-row w3-margin-top'>
<!--column pertama (quarter) untuk memaparkan menu utama -->
    <div class='w3-quarter w3-container w3-margin-bottom'>
        <div class='w3-container w3-blue'>
        <h5>MENU UTAMA</h5>
        </div>
    
        <div class='w3-card w3-round'>
<a href= 'laman_utama.php' class= ' w3-button w3-border-bottom w3-mobile w3-left-align'
style= 'width:100% '>
<i class='fa fa-home fa-fw w3-margin-right'></i>Laman Utama</a>
        
<a href= 'maklumat_rumah.php' class= 'w3-button w3-border-bottom w3-mobile
w3-left-align' style= 'width:100% '>
<i class='fa fa-bed fa-fw w3-margin-right'></i>Maklumat Rumah</a>
        
<a href= 'maklumat_tempahan.php' class= 'w3-button w3-border-bottom w3-mobile
w3-left-align' style= 'width:100% '>
<i class='fa fa-calender-check-o fa-fw w3-margin-right'></i>Maklumat Tempahan</a>
        
<a href='maklumat_pelanggan.php' class= 'w3-button w3-border-bottom w3-mobile
w3-left-align' style= 'width:100% '>
<i class='fa fa-users fa-fw w3-margin-right'></i>Maklumat Pelanggan</a>
        
<a href= 'maklumat_pengurus.php' class= 'w3-button w3-mobile w3-border-bottom
w3-left-align' style= 'width:100% '>
<i class='fa fa-users fa-fw w3-margin-right'></i>Maklumat Pengurus</a>
        
<a href= 'analisis.php' class= 'w3-button w3-mobile w3-border-bottom w3-left-align'
 style= 'width:100% '>
<i class="fa fa-line-chart w3-margin-right" aria-hidden="true"></i>Analisis Bulanan</a>
        
<a href= 'upload.php' class= ' w3-button w3-border-bottom w3-mobile w3-left-align'
style= 'width:100% '>
<i class='fa fa-upload fa-fw w3-margin-right'></i>Muat Naik Data Pengurus</a>
        
       </div>
    </div>
    
<!-- column kedua (threequarter) untuk memaparkan isi kandungan dalam pengurus side -->
    <div class='w3-threequarter w3-container w3-margin-bottom'>
    
<!-- Fungsi resizeText - tujuan untuk membesarkan saiz tulisan menggunakan id='saiz' -->
<script>
function resizeText(multiplier) {
    var elem = document.getElementById("saiz");
    var currentSize = elem.style.fontSize || 1;
    if(multiplier==2)
    {
        elem.style.fontSize = "1em";
    }
    else
    {
    elem.style.fontSize = ( parseFloat(currentSize) + (multiplier * 0.2)) + "em";
    }
}
</script>