<?PHP
# memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');
# arahan untuk mendapatkan maklumat tempahan lalu pengguna yang telah login
$arahan_sql_mencari="select* from tempahan, rumah, pelanggan, kategori
where
rumah.KategoriRumah=kategori.KategoriRumah and
tempahan.NoKP=pelanggan.NoKP AND
tempahan.KodRumah=rumah.KodRumah AND
tempahan.NoKP='".$_SESSION['NoKP']."'";
# melaksanakan arahan untuk mencari maklumat tempahan lalu
$laksana_arahan_sql=mysqli_query($condb,$arahan_sql_mencari);
?>

<div class='w3-row w3-margin'>
    <div class='w3-quarter w3-container w3-margin-bottom'>
        <div class='w3-container w3-card-2 w3-blue '>
            <h4 class='w3-tulisan-p2'>Maklumat Pengguna</h4>
        </div>
        <div class='w3-container w3-card-2 w3-white '>
            <p class='w3-margin-top'>Nama : <?PHP echo $_SESSION['NamaPelanggan']; ?></p>
            <p>No Kad Pengenalan : <?PHP echo $_SESSION ['NoKP']; ?></p>
            <p>No Telefon : <?PHP echo $_SESSION['NoTel']; ?></p>
            <p>Alamat Rumah : <?PHP echo $_SESSION['Alamat']; ?></p>
        </div>
    </div>
    <div class='w3-threequarter w3-container w3-margin-bottom'>
        <div class='w3-container w3-card-2 w3-blue'>
            <h4 class='w3-tulisan-p2 '>Senarai Tempahan Lalu</h4>
        </div>
        <div class='w3-container w3-card-2 w3-white w3-center'>
            <?PHP
            # jika terdapat 1 row atau lebih maklumat tempahan yang dicari,
            if(mysqli_num_rows($laksana_arahan_sql)>0)
            {
                echo"<table class='w3-table-all w3-margin-top w3-margin-bottom'>
                <tr>
                    <td>Bil</td>
                    <td>Kategori Rumah</td>
                    <td>Harga</td>
                    <td>Tarikh Masuk</td>
                    <td>Tarikh Keluar</td>
                    <td>Jumlah Bayaran</td>
                </tr>";
                
                
                $bil=0;
                # mengambil dan memaparkan maklumat tempahan yang dicari baris demi baris 
                while ($rekod=mysqli_fetch_array($laksana_arahan_sql))
                {
                    echo"<tr>
                             <td>".++$bil."</td>
                             <td>".$rekod['KategoriRumah']."</td>
                             <td>".$rekod['Harga']."</td>
                             <td>".$rekod['TarikhMasuk']."</td>
                             <td>".$rekod['TarikhKeluar']."</td>
                             <td>".$rekod['JumlahBayaran']."</td>
                         </tr>";
                }
            echo"</table>";
            }
            ?>
        </div>
    </div>
</div>
<?PHP include('footer.php'); ?>