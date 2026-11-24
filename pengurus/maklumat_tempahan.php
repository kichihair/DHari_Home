<?PHP
# Memanggil fail header_pengurus.php
include ('header_pengurus.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');

# arahan SQL mencari maklumat tempahan rumah
$arahan_sql_cari="SELECT* FROM tempahan,pelanggan,kategori,rumah
WHERE
tempahan.NoKP=pelanggan.NoKP AND
tempahan.KodRumah=rumah.KodRumah AND
rumah.KategoriRumah=kategori.KategoriRumah";

# arahan SQL mencari tempahan rumah
$laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>
<!-- menyediakan header bagi jadual -->
<div class='w3-container w3-blue'>
<h5>Senarai Tempahan</h5>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom '>
<table id='saiz' border='1' class='w3-table-all w3-responsive w3-margin w3-margin-bottom'>
    <tr>
        <td>Bil</td>
        <td>Nama</td>
        <td>No Kad Pengenalan</td>
        <td>No Telefon</td>
        <td>Alamat</td>
        <td>No Rumah</td>
        <td>Kategori Rumah</td>
        <td>Harga Semalam</td>
        <td>Tarikh Masuk</td>
        <td>Tarikh Keluar</td>
        <td>Jumlah Bayaran</td>
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
            <td>".$rekod['NamaPelanggan']."</td>
            <td>".$rekod['NoKP']."</td>
            <td>".$rekod['NoTel']."</td>
            <td>".$rekod['Alamat']."</td>
            <td>".$rekod['KodRumah']."</td>
            <td>".$rekod['KategoriRumah']."</td>
            <td>".$rekod['Harga']."</td>
            <td>".$rekod['TarikhMasuk']."</td>
            <td>".$rekod['TarikhKeluar']."</td>
            <td>".$rekod['JumlahBayaran']."</td>
        </tr>";
    }
    ?>
</table>
</div>
<div>
<div>
<?PHP include('../footer.php'); ?>