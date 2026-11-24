<?PHP
# Memanggil fail header_pengurus.php
include ('header_pengurus.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');

# menyemak kewujudan data POST
if(!empty($_POST))
{
    $tambahan="AND TarikhMasuk like '%".$_POST['bulan']."%'";
}
else
{
    $tambahan=" ";
}
 
# arahan SQL untuk mencari data sewaan mengikut bulan
$arahan_sql_cari="SELECT*
FROM tempahan,pelanggan,kategori,rumah
WHERE
tempahan.NoKP=pelanggan.NoKP AND
tempahan.KodRumah=rumah.KodRumah AND
rumah.KategoriRumah=kategori.KategoriRumah $tambahan";

# melaksanakan arahan SQL mencari data sewaan
$laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>

<!-- Menyediakan form untuk memilih bulan-->
<div class='w3-container w3-blue'>
<h5>Senarai Tempahan</h5>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom'>
<form class='w3-form w3-margin' action='' method='POST'>
<table class='w3-table-all w3-centered'>
                <tr>
                    <td>
                    <select class='w3-select w3-border' name='bulan' required>
                        <option value selected disabled>Pilih Bulan</option>
                        <option value='-01-'>Januari</option>
                        <option value='-02-'>Februari</option>
                        <option value='-03-'>Mac</option>
                        <option value='-04-'>April</option>
                        <option value='-05-'>Mei</option>
                        <option value='-06-'>Jun</option>
                        <option value='-07-'>Julai</option>
                        <option value='-08-'>Ogos</option>
                        <option value='-09-'>September</option>
                        <option value='-10-'>Oktober</option>
                        <option value='-11-'>November</option>
                        <option value='-12-'>Disember</option>
                    </select>
                    </td>
                    <td>
                    <input class='w3-button w3-block w3-blue-grey' type='submit' value='cari'>
                    </td>
                </tr>
            </table>
            </form>
<!-- menyediakan header untuk jadual yang hendak memaparkan data yang dicari -->
    <?PHP
    $bil=0;
    $JumlahPendapatan=0;
    if(mysqli_num_rows($laksana_sql_cari)>=1)
    {
        echo "
<table id='saiz' border='1' class='w3-table-all w3-responsive w3-margin w3-margin-bottom'>
            <tr>
                <td>Bil</td>
                <td>NamaPelanggan</td>
                <td>NoKp</td>
                <td>NoTel</td>
                <td>Alamat</td>
                <td>KodRumah</td>
                <td>KategoriRumah</td>
                <td>Harga</td>
                <td>TarikhMasuk</td>
                <td>TarikhKeluar</td>
                <td>JumlahBayaran</td>
            </tr>";
        
    # pembolehubah $rekod mengambil data yang dicari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
        $JumlahPendapatan=$JumlahPendapatan+$rekod['JumlahBayaran'];
        echo "
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
    echo"</table>";
    echo "<h4><b>Jumlah Pendapatan : RM ".$JumlahPendapatan."</b></h4>";
    }
    else
    {
        echo "Maaf. Tiada maklumat tempahan pada bulan yang dipilih";
    }
    ?>
    </div>

<div>
<div>

<?PHP include('../footer.php'); ?>