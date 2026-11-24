<?PHP
# memanggil fail header.php
include('header.php');
# nilai session['NoKP'] empty atau tidak
if(empty($_SESSION['NoKP']))
{
    # jika nilai session['NoKP'] empty. bermaksud pelanggan belum login
    die("<script>alert('Sila daftar masuk sebelum meneruskan proses tempahan');
    window.location.href='pelanggan_login.php';</script>");
}
# menyemak kewujudan data GET
if(!empty($_GET))
{
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
}
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
        <label><b>Harga Semalam : </b>RM</label><?PHP echo $data_get['Harga']; ?> <br>      
        <label><b>Tarikh Masuk : </b></label><?PHP echo $data_get['masuk']; ?> <br>
        <label><b>Tarikh Keluar : </b></label><?PHP echo $data_get['keluar']; ?> <br>
        <label><b>Bilangan Hari : </b></label><?PHP echo $data_get['BilanganHari']; ?> <br>
        <label><b>Jumlah Bayaran : </b>RM</label><?PHP echo $data_get['Harga']*$data_get['BilanganHari']; ?> <br>
<!-- borang untuk Pembayaran (tidak wajib) -->
<h4>Pembayaran menggunakan kad kredit</h4>
<hr>
<form action='tempahan_proses.php?<?PHP echo http_build_query($data_get);?>' method='POST'>
<table class='w3-table w3-striped'>
<tr>
    <td colspan='3'>
<input class='w3-input w3-border w3-round-xxlarge' type='text' name='name_on_card'
placeholder = 'Nama atas kad'>
    </td>
</tr>
<tr>
    <td colspan='3'>
<input class='w3-input w3-border w3-round-xxlarge' type='text' name='card_no'
placeholder = 'Nombor depan kad' maxlength='12'>
    </td>
</tr>
<tr>
    <td>
<input class='w3-input w3-border w3-round-xxlarge' size='3' maxlength='2' type='text'
name='mm' placeholder = 'MM' >
    </td>
    <td>
<input class='w3-input w3-border w3-round-xxlarge' size='3' maxlength='4' type='text'
name='mm' placeholder = 'YYYY'>
    </td>
    <td>
<input class='w3-input w3-border w3-round-xxlarge' size='3' maxlength='3' type='text'
name='cc' placeholder = 'CCV'>
    </td>
</tr>
<tr>
    <td colspan='3'>
<input class='w3-input w3-border w3-round-xxlarge' type='text' name='alamat'
placeholder = 'Alamat Bil'>
    </td>
</tr>
<tr>
    <td colspan='3'>
<input class='w3-input w3-border w3-round-xxlarge' maxlength='5' type='text' name='poskod'
placeholder = 'Poskod'>
    </td>
</tr>
</table>
<hr>
<input class="w3-button w3-round-xxlarge w3-blue-grey w3-
bar" type='submit' onclick="return confirm('Anda pasti ingin bayar?')" value='Bayar'>
</form>
</div>
  </div>
  <div class="w3-quarter w3-container">
    
  </div>
</div>