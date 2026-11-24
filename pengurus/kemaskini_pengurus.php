<!-- Memanggil fail header_pengurus.php -->
<?PHP include ('header_pengurus.php'); ?>
<!-- menyediakan borang untuk mengemaskini data pengurus-->
<div class='w3-container w3-deep-orange'>
<h5>Kemaskini Data Pengurus</h5>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom'>
<form class='w3-margin' action='' method='POST'>
    
<label><b>Nama Pengurus</b></label>
<input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='nama_baru' value='<?PHP echo $_GET['nama']; ?>'><br>
    
<label><b>No Kad Pengenalan Pengurus</b></label>
<input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='nokp_baru' value='<?PHP echo $_GET['nokp']; ?>'><br>
    
<label><b>Katalaluan Pengurus</b></label>
<input class='w3-input w3-border w3-round-xxlarge w3-large' type='password'
name='katalaluan_baru' value='<?PHP echo $_GET['katalaluan']; ?>'><br>
    
<input class='w3-button w3-yellow w3-round-xxlarge w3-margin-bottom' type='submit'
value='kemaskini'>
</form>
</div>
<div>
</div>
<?PHP include('../footer.php'); ?>
<?PHP
# menyemak kewujudan data POST
if(!empty($_POST))
{
    # Memanggil fail connection dari folder luaran
    include ('../connection.php');
    
    # mengambil data POST
    $nama_baru=$_POST['nama_baru'];
    $nokp_baru=$_POST['nokp_baru'];
    $katalaluan_baru=$_POST['katalaluan_baru'];
    $nokp_lama=$_GET['nokp'];
    
    # Arahan untuk mengemaskini data ke dalam jadual pengurus
    $arahan_sql_update="update pengurus set
    nama_pengurus='$nama_baru',
    nokp_pengurus='$nokp_baru',
    katalaluan='$katalaluan_baru'
    where
    nokp_pengurus='$nokp_lama'";
    
    # melaksanakan proses mengemaskini dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_update))
    {
        # proses mengemaskini berjaya.
        echo "<script>alert('Kemaskini Berjaya');
        window.location.href='maklumat_pengurus.php';
        </script>";
    }
    else
    {
        # proses mengemaskini gagal
        echo "<script>alert('Kemaskini Gagal');
        window.history.back();</script>";
    }
}

?>