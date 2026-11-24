<?PHP
# memanggil fail header.php
include('header.php');

# menyemak kewujudan data POST
if(!empty($_POST))
{
    # memanggil fail connection.php
    include('connection.php');
    
    # mengambil data POST
    $masuk=$_POST['TarikhMasuk'];
    $keluar=$_POST['TarikhKeluar'];
    
    # data validation tarikh masuk lebih kecil dari tarikh keluar
    if($masuk>=$keluar)
    {
        die("<script>alert('Tarikh masuk lebih besar daripada tarikh keluar');
        window.history.back();</script>");
    }
    
    # mengira bilangan hari
    $start = strtotime($masuk);
    $end = strtotime($keluar);
    $BilanganHari = ceil(abs($end - $start) / 86400);
    
    # arahan sql untuk memilih homestay yang masih kosong pada tarikh dipilih
    $arahan_SQL_cari= "select* from rumah,kategori
    where
    rumah.KodRumah not in(select KodRumah from tempahan where
    TarikhKeluar >='$masuk')
    and rumah.KategoriRumah=kategori.KategoriRumah";
    
    # melaksanakan arahan memilih
    $laksana_arahan_cari=mysqli_query($condb,$arahan_SQL_cari);
    
    # jika bilangan row yang ditemui lebih kecil dari 1. bermaksud tiada kekosongan
    if(mysqli_num_rows($laksana_arahan_cari)<1)
    {
        die ("<script>alert('Maaf. Tiada kekosongan pada tarikh yang dipilih');
        window.location.href='index.php';</script>");
    }
echo"<table class='w3-table-all'>";
    # pembolehubah $rekod mengambil data yang di pilih baris demi baris
    while ($rekod=mysqli_fetch_array($laksana_arahan_cari))
    {
        # mengumpukan data yang diambil kepada tatasusunan $data_get
        $data_get= array(
            'KodRumah'=>$rekod['KodRumah'],
            'KategoriRumah'=>$rekod['KategoriRumah'],
            'Harga'=>$rekod['Harga'],
            'gambar'=>$rekod['gambar'],
            'masuk'=>$masuk,
            'keluar'=>$keluar,
            'BilanganHari'=>$BilanganHari
    
        );
        # memaparkan data yang diambil baris demi baris
        echo "
        <tr>
            <td width='50%'>
            
            <div class='w3-container w3-card w3-white'>
            <h4 class='w3-center'><b>Kategori Rumah : </b>".$rekod['KategoriRumah']."</h4>
            
            <table class='w3-table-all'>
                <tr>
                    <td><b>No Rumah</b></td>
                    <td>:</td>
                    <td>".$rekod['KodRumah']."</td>
                </tr>
            <tr>
                    <td><b>Harga Semalam</b></td>
                    <td>:</td>
                    <td>RM ".$rekod['Harga']."</td>
                </tr>
                <tr>
                    <td><b>Bilangan Hari</b></td>
                    <td>:</td>
                    <td>".$BilanganHari." Hari</td>
                </tr>
                <tr>
                    <td><b>Jumlah Bayaran</b></td>
                    <td>:</td>
                    <td>RM  ".$rekod['Harga']*$BilanganHari."</td>
                </tr>
            </table>
            <hr>
<a class='w3-button w3-blue-grey w3-round-xxlarge w3-margin-bottom w3-bar'
href='tempahan_bayar.php?".http_build_query($data_get)."'>Tempah</a>
            </div>
            </td>
            <td>
      <img class='w3-image w3-round-large w3-card-4'src='images/kategori/".$rekod['gambar']."'>
            </td>
        </tr>";
    }
    echo "</table>";

}
include('footer.php');
?>