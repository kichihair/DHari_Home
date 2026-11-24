<!-- Memanggil fail header_pengurus.php-->
<?PHP include('header_pengurus.php'); ?>
<!-- form untuk upload fail data-->
<div class='w3-container w3-blue'>
        <h5>Senarai Pengurus Berdaftar</h5>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom'>
        <form action='' method='POST' enctype='multipart/form-data'>
            <table class='w3-table-all'>
                 <caption>Sila pilih fail txt yang ingin diupload</caption>
                 <tr>
                     <td>
                         <input class='w3-input w3-border' type='file' name='data_pengurus'>
                     </td>
                     <td>
         <button class='w3-button w3-blue-grey' type='submit' name='btn-upload'>Muat Naik</button>
                     </td>
                 </tr>
             </table>
        </form>
</div>
<div>
</div>
<?PHP include('../footer.php'); ?>
<?PHP
if (isset($_POST['btn-upload']))
{
    include ('../connection.php');
    # mengambil nama sementara fail
    $namafailsementara=$_FILES["data_pengurus"]["tmp_name"];
    # mengambil nama fail
    $namafail=$_FILES['data_pengurus']['name'];
    # mengambil jenis fail
    $jenisfail=pathinfo($namafail,PATHINFO_EXTENSION);
    # menguji jenis fail dan saiz fail
    if($_FILES["data_pengurus"]["size"]>0 AND $jenisfail="txt")
    {
        # membuka fail yang diambil
        $fail_data=fopen($namafailsementara,"r");
        # mendapatkan data dari fail baris demi baris
        while (!feof($fail_data))
        {
            # mengambil data sebaris sahaja bg setiap pusingan
            $ambilbarisdata = fgets($fail_data);
            
            #memecahkan baris data mengikut tanda pipe
            $pecahkanbaris = explode("|",$ambilbarisdata);
            # selepas pecahan tadi akan diumpukan kepada 3
            list($nokp_pengurus,$nama_pengurus,$katalaluan) = $pecahkanbaris;
            
            # arahan SQL untuk menyimpan data
            $arahan_sql_simpan="insert into pengurus
            (nokp_pengurus,nama_pengurus,katalaluan) values
            ('$nokp_pengurus','$nama_pengurus','$katalaluan')";
            
            # memasukkan data kedalam jadual pengurus
            $laksana_arahan_simpan=mysqli_query($condb, $arahan_sql_simpan);
            echo"<script>alert('Import Fail Data Selesai.');
            window.location.href='maklumat_pengurus/.php';</script>";
        }
    fclose($fail_data);
    }
    else  {
        echo"<script>alert('Hanya fail berformat txt sahaja dibenarkan');</script>";
    }
}
?>