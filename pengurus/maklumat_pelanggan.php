<?PHP
# Memanggil fail header_pengurus.php
include ('header_pengurus.php');
# Memanggil fail connection dari folder luaran 
include ('../connection.php');

# arahan SQL mencari pelanggan berdaftar
$arahan_sql_cari="select* from pelanggan";
# Melaksanakan arahan SQL mencari pelanggan berdaftar
$laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>
<!-- menyediakan header bagi jadual -->
<div class='w3-container w3-blue'>
<h5>Senarai Pelanggan Berdaftar</h5>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom'>
<table id='saiz' border='1' class='w3-table-all w3-responsive w3-margin w3-margin-bottom'>
    <tr>
        <td>Bil</td>
        <td>Nama</td>
        <td>No Kad Pengenalan</td>
        <td>No Telefon</td>
        <td>Alamat</td>
        <td>Kata Laluan</td>
        <td></td>
    </tr>
    <?PHP
    $bil=0;
    # pemboleh ubah $rekod mengambil semua data yang ditemui oleh $laksana_sql_cari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
        # sistem akan memaparkan data $rekod baris demi baris sehinggan habis
        echo "
        <tr>
            <td>".++$bil."</td>
            <td>".$rekod['NamaPelanggan']."</td>
            <td>".$rekod['NoKP']."</td>
            <td>".$rekod['NoTel']."</td>
            <td>".$rekod['Alamat']."</td>
            <td>".$rekod['KataLaluan']."</td>
            <td><a class='w3-button w3-blue-grey w3-round-xxlarge w3-margin-bottom'
href='hapus.php?jadual=pelanggan&medan_kp=NoKP&kp=".$rekod['NoKP']."'
onClick=\"return confirm('Anda pasti ingin padam data ini?')\" >Hapus</a></td>
        </tr>";
    }
    ?>
</table>
</div>

<div>
</div>
<?PHP include('../footer.php'); ?>