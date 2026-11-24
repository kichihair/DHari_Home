<?PHP
# Memanggil fail header_pengurus.php
include ('header_pengurus.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');

# -----------------------------------------------------------------------------------
# arahan SQL untuk mencari bilangan rumah
$arahan_sql_bilrumah="select count(KodRumah) as bil_rumah from rumah";
# Laksanakan arahan mencari bilangan rumah yang ada yang pernah berdaftar
$laksana_sql_bilrumah=mysqli_query($condb,$arahan_sql_bilrumah);
# pembolehubah $rekod_bilrumah mengambil data bilangan rumah yang pernah berdaftar
$rekod_bilrumah=mysqli_fetch_array($laksana_sql_bilrumah);

# -----------------------------------------------------------------------------------
# arahan SQL untuk mencari bilangan rumah yang telah kosong di hari ini
$arahan_sql_bilrumahkosong="select count(KodRumah) as bil_rumahkosong from rumah,kategori
where
rumah.KodRumah not in(select KodRumah from tempahan where
TarikhKeluar >= '".date('Y-m-d')."')
and rumah.KategoriRumah=kategori.KategoriRumah";
# laksanakan arahan mencari bilangan rumah yang telah kosong di hari ini
$laksana_sql_bilrumahkosong=mysqli_query($condb,$arahan_sql_bilrumahkosong);
# pemboleh $rekod_bilrumahkosong mengambil data bilangan rumah yang telah kosong di hari ini
$rekod_bilrumahkosong=mysqli_fetch_array($laksana_sql_bilrumahkosong);

# -----------------------------------------------------------------------------------
# arahan SQL untuk mengira pendapatan bulanan
$arahan_sql_untung="select sum(JumlahBayaran) as untung from tempahan
where TarikhKeluar LIKE '%".date('-m-')."%'";
# laksanakan arahan mengira jumlah bayaran yang telah dibuat
$laksana_sql_untung=mysqli_query($condb,$arahan_sql_untung);
# pemboleh ubah $rekod_untung mengambil data jumlah keuntungan
$rekod_untung=mysqli_fetch_array($laksana_sql_untung);
# -----------------------------------------------------------------------------------

?>
<!-- memaparkan maklumat hasil carian di atas -->
<div class='w3-container w3-blue'>
    <h5>Laman Utama Pengurus</h5>
</div>

    <div class='w3-container w3-card-2 w3-margin-bottom'>
        <div class="w3-panel w3-topbar w3-bottombar w3-border-blue-grey w3-pale-blue">
            <p><b>Bilangan Rumah : </b> <?PHP echo $rekod_bilrumah['bil_rumah']; ?> Buah</p>
        </div>
        <div class="w3-panel w3-topbar w3-bottombar w3-border-blue-grey w3-pale-blue">
            <p><b>Bilangan yang belum disewa pada hari ini: </b> <?PHP echo $rekod_bilrumahkosong['bil_rumahkosong']; ?> Buah</p>
        </div>
        <div class="w3-panel w3-topbar w3-bottombar w3-border-blue-grey w3-pale-blue">
            <p><b>Jumlah keuntungan : </b>RM <?PHP echo $rekod_untung['untung']; ?></p>
        </div>
    </div>
<div>

</div>
<?PHP include('../footer.php'); ?>