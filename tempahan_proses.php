<?PHP
# memulakan fungsi session
session_start();
# memanggil fail connection.php
include('connection.php');

    # Mengumpukan data GET kepada tatasusunan
    $data_get= array(
        'KodRumah'=>$_GET['KodRumah'],
        'KategoriRumah'=>$_GET['KategoriRumah'],
        'Harga'=>$_GET['Harga'],
        'gambar'=>$_GET['gambar'],
        'masuk'=>$_GET['masuk'],
        'keluar'=>$_GET['keluar'],
        'BilanganHari'=>$_GET['BilanganHari']
    );
# Mengira jumlah bayaran bilangan hari X dengan harga 
$JumlahBayaran=$data_get['BilanganHari']*$data_get['Harga'];

# Arahan SQL untuk menyimpan data ke dalam jadual tempahan
$arahan_SQL_simpan="insert into tempahan
(NoKP,KodRumah,TarikhMasuk,TarikhKeluar,JumlahBayaran)
values
('".$_SESSION['NoKP']."','".$data_get['KodRumah']."','".$data_get['masuk']."','".$data_get['keluar']."','".$JumlahBayaran."')";

# melaksanakan proses menyimpan data dalam syarat IF
if(mysqli_query($condb,$arahan_SQL_simpan))
{
    echo "<script>alert('Tempahan Berjaya');
    window.location.href='tempahan_resit.php?".http_build_query($data_get)."';</script>";
}
else
{
    # jika proses menyimpan gagal. Kembali ke laman sebelumnya.
    echo "<script>alert('Tempahan Gagal');
    </script>";
}
?>