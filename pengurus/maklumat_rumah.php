<?PHP
# Memanggil fail header_pengurus.php
include ('header_pengurus.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');

#----------- Bahagian 2 : Proses penyimpan data-------
# Menyemak kewujudan data POST
if(!empty($_POST))
{
    # mengambil data POST
    $KodRumah=$_POST['KodRumah'];
    $KategoriRumah=$_POST['KategoriRumah'];
    $Harga=$_POST['Harga'];
    
    # Arahan untuk menyimpan data ke dalam jadual rumah
    $arahan_sql_simpan="insert into rumah
    values
    ('$KodRumah','$KategoriRumah','$Harga')";
    
    # melaksanakan proses menyimpan dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        move_uploaded_file($lokasi,$folder);
        # proses menyimpan data berjaya. papar mesej
        echo "<script>alert('Pendaftaran Berjaya');</script>";
    }
    else
    {
        # proses menyimpan data gagal. papar mesej
        echo "<script>alert('Pendaftaran Gagal');
        window.history.back();</script>";
    }
}

# ----------- bahagian 1 : memaparkan data dalam bentuk jadual

# arahan SQL mencari data rumah
$arahan_sql_cari="select* from rumah,kategori
where rumah.KategoriRumah=kategori.KategoriRumah";

# melaksanakan arahan sql cari tersebut
$laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>

<!-- menyediakan header bagi jadual -->
<!-- selepas header akan diselitkan dengan borang untuk mendaftar rumah baru -->
<div class='w3-container w3-blue'>
<h5>Senarai Rumah</h5>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom'>
<table id='saiz' border='1' class='w3-table-all w3-responsive w3-margin w3-margin-bottom'>
    <tr>
        <td>Bil</td>
        <td>No Rumah</td>
        <td>Kategori Rumah</td>
        <td>Harga</td>
        <td>Gambar</td>
        <td></td>
    </tr>
    <tr>
    <!-- menyediakan borang untuk mendaftar rumah baru -->
    <form action='' method='POST' enctype='multipart/form-data'>
        <td>#</td>
 <td><input class='w3-input w3-border w3-round-xxlarge w3-large' size='5' type='text' name='KodRumah'></td>
        <td>
        <!-- menghasilkan drop down yang dinamik (mengambil data dari jadual kategori) -->
        <select class='w3-select w3-border w3-round-large' name='KodKategori' required>
                <option disabled selected value>Pilih kategori</option>
                <?PHP
            
                # arahan mencari data dari jadual kategori
                $arahan_sql_cariKategoriRumah="SELECT* from kategori";
            
                # melaksanakan arahan mencari tersebut
                $laksana_sql_cariKategoriRumah=mysqli_query($condb,$arahan_sql_cariKategoriRumah);
            
                # pembolehubah $rekod_model mengambil data baris demi baris
                while($rekod_KategoriRumah=mysqli_fetch_array($laksana_sql_cariKategoriRumah))
                {
           # memaparkan nilai pemboleh ubah $rekod_KategoriRumah['KategoriRumah'] dalam bentuk dropdown list
                    echo"<option value='".$rekod_kategori['KodKategori']."'>
                    ".$rekod_KategoriRumah['KategoriRumah']."</option>";
                }
                ?>
            </select>
        </td>
        <td><input class='w3-input w3-border w3-round-xxlarge ' type='text'
name='Harga'></td>
        <td><input class='w3-input w3-border w3-round-xxlarge ' size='5' type='file'
name='gambar'></td>
        <td><input class='w3-button w3-blue-grey w3-round-xxlarge w3-margin-bottom' type='submit'
value='simpan'></td>
    </form>
    </tr>
    
    <?PHP
    $bil=0;
    # pemboleh ubah  $rekod mengambil semua data yang ditemui oleh $laksana_sql_cari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
        
 # sistem akan memaparkan data $rekod baris demi baris sehingga habis
        echo"
        <tr>
            <td>".++$bil."</td>
            <td>".$rekod['KodRumah']."</td>
            <td>".$rekod['KategoriRumah']."</td>
            <td>".$rekod['Harga']."</td>
            <td><img src='../images/kategori/".$rekod['gambar']."' width='10%'></td>
            <td><a class='w3-button w3-blue-grey w3-round-xxlarge w3-margin-bottom'
            href='hapus.php?jadual=rumah&medan_kp=KodRumah&kp=".$rekod['KodRumah']."'
            onClick=\"return confirm('Anda pasti ingin padam data ini?')\" >Hapus</a></td>
        </tr>";
    }
    ?>
</table>
</div>

<?PHP include('../footer.php'); ?>