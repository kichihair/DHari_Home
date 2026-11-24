<?PHP
# Memanggil fail header_pengurus.php
include ('header_pengurus.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');

#----------- Bahagian 2 : Proses penyimpan data-------
# Menyemak kewujudan data POST
if(!empty($_GET))
{   # mengambil data POST
    $nama=$_GET['nama'];
    $nokp=$_GET['nokp'];
    $katalaluan=$_GET['katalaluan'];

    # data validation - adakah data POST yang diambil empty
    if(empty($nama) or empty($nokp) or empty($katalaluan))
    {
        die("<script>alert('Lengkapkan maklumat yang dikehendaki.');
        window.history.back();</script>");
    }
    
    # data validation - format nokp betul atau tidak
    if(strlen($nokp)!=12 or !is_numeric($nokp))
    {
        die("<script>alert('Ralat pada nokp');
        window.history.back();</script>");
    }
    
    # Arahan untuk menyimpan data ke dalam jadual pengurus
    $arahan_sql_simpan="insert into pengurus
    (nama_pengurus,nokp_pengurus,katalaluan)
    values
    ('$nama','$nokp','$katalaluan')";
    
    # melaksanakan proses menyimpan dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        # proses menyimpan data berjaya. papar mesej
        echo "<script>alert('Pendaftaran Berjaya');
        window.location.href='maklumat_pengurus.php';
        </script>";
    }
    else
    {
        # proses menyimpan data gagal. papar mesej
        echo "<script>alert('Pendaftaran Gagal');
        window.history.back();</script>";
    }
}
# ----------- bahagian 1 : memaparkan data dalam bentuk jadual
    # arahan SQL mencari data pengurus
    $arahan_sql_cari="select* from pengurus";
    # melaksanakan arahan sql cari tersebut 
    $laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>

<!-- menyediakan header bagi jadual -->
<!-- selepas header akan diselitkan dengan borang untuk mendaftar pengurus baru -->
<div class='w3-container w3-blue'>
<h5>Senarai Pengurus</h5>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom'>
<table id='saiz' border='1' class='w3-table-all w3-responsive w3-margin w3-margin-bottom'>
    <tr>
        <td>Bil</td>
        <td>Nama</td>
        <td>No Kad Pengenalan</td>
        <td>Kata Laluan</td>
        <td></td>
    </tr>
    <tr>
    <!-- menyediakan borang untuk mendaftar pengurus baru -->
    <form action='' method='GET'>
        <td>#</td>
        <td><input class='w3-input w3-border w3-round-xxlarge w3-large' type='text'
name='nama'></td>
        <td><input class='w3-input w3-border w3-round-xxlarge w3-large' type='text'
name='nokp'></td>
        <td><input class='w3-input w3-border w3-round-xxlarge w3-large' type='password'
name='katalaluan'></td>
        <td><input class='w3-button w3-blue-grey w3-round-xxlarge w3-margin-bottom' type='submit'
value='simpan'></td>
    </form>
    </tr>
    <?PHP
    $bil=0;
    # pemboleh ubah $rekod mengambil semua data yang ditemui oleh $laksana_sql_cari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
        # sistem akan memaparkan data $rekod baris demi baris sehingga habis
        echo"
        <tr>
            <td>".++$bil."</td>
            <td>".$rekod['nama_pengurus']."</td>
            <td>".$rekod['nokp_pengurus']."</td>
            <td>".$rekod['katalaluan']."</td>
            
<td>| <a href='hapus.php?jadual=pengurus&medan_kp=nokp_pengurus&kp=".$rekod['nokp_pengurus']."' onClick=\"return confirm('Anda pasti ingin padam data ini?')\" >Hapus</a> | | <a href='kemaskini_pengurus.php?nama=".$rekod['nama_pengurus']."&nokp=".$rekod['nokp_pengurus']."&katalaluan=".$rekod['katalaluan']."' onClick=\"return confirm('Anda pasti ingin mengubahsuai data ini?')\" >Kemaskini</a> |</td>

        </tr>";
    }
    ?>
</table>
</div>

<div>
</div>
<?PHP include('../footer.php'); ?>