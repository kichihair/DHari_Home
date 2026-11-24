<!--Memanggil fail header-->
<?PHP include('header.php'); ?>

<!--Menyediakan form bagi daftar pengguna baru-->
<div class="w3-row w3-margin-top">
  <div class="w3-third w3-container">
        <div class='w3-container w3-blue w3-round-large'>
            <h4 class='w3-tulisan-p2 '>Daftar Pengguna Baru</h4>
        </div>
        <div class='w3-container w3-card'>
            <h4>Lengkapkan semua maklumat di bawah</h4>
            <form action='' method='POST'>
                <label>Nama <span class="w3-badge w3-grey w3-tiny">wajib</span></label>
    <input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='nama'>
            
         <label>No Kad Pengenalan <span class="w3-badge w3-grey w3-tiny">wajib</span></label>
    <input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='nokp'>
            
                <label>No Telefon <span class="w3-badge w3-grey w3-tiny">wajib</span></label>
    <input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='notel'>
                
                <label>Alamat Rumah <span class="w3-badge w3-grey w3-tiny">wajib</span></label>
    <input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='alamat'>
            
                <label>Kata Laluan <span class="w3-badge w3-grey w3-tiny">wajib</span></label>
<input class='w3-input w3-border w3-round-xxlarge w3-large'type='password'name='katalaluan'><br>
<input class="w3-button w3-blue-grey w3-round-xxlarge w3-margin-bottom" type='submit' value='Daftar'>
            </form>
        </div>
  </div>
  <div class="w3-twothird w3-container">
          <p><img class='w3-image w3-round-large w3-card-4'src='images/logpic.png'></p>
  </div>
</div>
<?PHP include('footer.php'); ?>

<?PHP
# menyemak kewujudan data POST
if (!empty($_POST))
{
    # memanggil fail connection
    include ('connection.php');
    
    # mengambil data POST
    $nama=$_POST['nama'];
    $nokp=$_POST['nokp'];
    $notel=$_POST['notel'];
    $alamat=$_POST['alamat'];
    $katalaluan=$_POST['katalaluan'];
    
    # -- data validation --
    if(empty($nama) or empty($nokp) or empty($notel) or empty($alamat) or empty($katalaluan))
    {
        die("<script>alert('Lengkapkan maklumat yang dikehendaki.');
        window.history.back();</script>");
    }
    # --- data validation --
    if(strlen($nokp)!=12 or !is_numeric($nokp))
    {
        die("<script>alert('No Kad Pengenalan kurang atau lebih daripada 12');
        window.history.back();</script>");
    }
    
    # arahan SQL untuk meyimpan data
    $arahan_sql_simpan="insert into pelanggan
    (NamaPelanggan,NoKP,NoTel,Alamat,KataLaluan)
    values
    ('$nama','$nokp','$notel','$alamat','$katalaluan')";
    
    # melaksanakan proses menyimpan dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        # jika proses menyimpan berjaya. papar info dan buka laman pelanggan_login.php
        echo "<script>alert('Pendaftaran Berjaya');
        window.location.href='pelanggan_login.php';</script>";
    }
    else
    {
        # jika proses menyimpan gagal, kembali ke laman sebelumnya
        echo "<script>alert('Pendaftaran Gagal');
        window.history.back();</script>";
    }
}
?>