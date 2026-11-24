<!--Memanggil fail header-->
<?PHP include('header.php'); ?>
<!--Menyediakan form bagi daftar masuk pengguna-->
<div class="w3-row w3-margin-top">
  <div class="w3-third w3-container">
        <div class='w3-container w3-blue w3-round-large'>
            <h4 class='w3-tulisan-p2 '>Daftar Masuk</h4>
        </div>
        <div class='w3-container w3-card'>
            <h4>Lengkapkan semua maklumat di bawah</h4>
            <form action='' method='POST'>
<label>Nama </label>
<input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='nama'>
            
<label>Kata Laluan </label>
<input class='w3-input w3-border w3-round-xxlarge w3-large' type='password' name='katalaluan'>
<br>
            
<input class="w3-button w3-blue-grey w3-round-xxlarge w3-margin-bottom" type='submit'
value='Log Masuk'>
            </form>
        </div>
  </div>
  <div class="w3-twothird w3-container">
        <p><img class='w3-image w3-round-large w3-card-4' src='images/logpic.png'></p>
  </div>
</div>
<?PHP include('footer.php'); ?>
<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
    # memanggil fail connection.php
    include ('connection.php');
    
    # mengambil data POST
    $nama=$_POST['nama'];
    $katalaluan=$_POST['katalaluan'];
    
    # arahan SQL untuk mencari data dari jadual pelanggan
    $arahan_sql_cari="select* from pelanggan
    where NamaPelanggan='$nama' and KataLaluan='$katalaluan'
    limit 1 ";
    
    # melaksanakan proses carian
    $laksana_arahan=mysqli_query($condb,$arahan_sql_cari);
    
    # jika terdapat 1 baris rekod di temui
    if(mysqli_num_rows($laksana_arahan)==1)
    {
        # pembolehubah $rekod mengambil data yang di temui semasa proses mencari
        $rekod=mysqli_fetch_array($laksana_arahan);
        #mengumpukan kepada pembolehubah session
        $_SESSION['NamaPelanggan']=$rekod['NamaPelanggan'];
        $_SESSION['NoKP']=$rekod['NoKP'];
        $_SESSION['NoTel']=$rekod['NoTel'];
        $_SESSION['Alamat']=$rekod['Alamat'];
        # megarahkan fail index.php dibuka
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        # login gagal. kembali ke laman sebelumnya
        echo "<script>alert('Log Masuk Gagal');
        window.history.back();</script>";
    }
}
?>