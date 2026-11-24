<?PHP
# memanggil fail header.php
include('header.php');

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
?>
<div class="w3-row">
  <div class="w3-quarter w3-container ">
  </div>
  <div class="w3-half w3-container w3-margin-top w3-card-2 ">
    <div class='w3-margin w3-animate-opacity'>
        <!-- Memaparkan semua maklumat tempahan -->
        <h4>Maklumat Tempahan</h4>
        <label><b>No Rumah : </b></label><?PHP echo $data_get['KodRumah']; ?> <br>
        <label><b>Kategori Rumah : </b></label><?PHP echo $data_get['KategoriRumah']; ?> <br>
        <label><b>Harga Semalam : RM</b></label><?PHP echo $data_get['Harga']; ?> <br>
        <label><b>Tarikh Masuk : </b></label><?PHP echo $data_get['masuk']; ?> <br>
        <label><b>Tarikh Keluar : </b></label><?PHP echo $data_get['keluar']; ?> <br>
        <label><b>Bilangan Hari : </b></label><?PHP echo $data_get['BilanganHari']; ?> <br>
        <label><b>Jumlah Bayaran : RM</b></label>
       <?PHP echo $data_get['Harga']*$data_get['BilanganHari']; ?> <br>
        <hr>
<a target='_BLANK' class='w3-button w3-blue-grey w3-round-xxlarge w3-margin-bottom'
   href='resit_cetak.php?<?PHP echo http_build_query($data_get); ?>'>Cetak Resit</a>
<script>
function myFunction()
{
        window.print();
}
</script>
<button onclick='myFunction()'>Print</button>
      </div>
     </div>

    <div class="w3-quarter w3-container">
    </div>
</div>