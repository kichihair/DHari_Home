<?PHP
# menyemak kewujudan data GET
if(!empty($_GET))
{
    # Memanggil fail connection dari folder luaran
    include ('../connection.php');
    
    # Memanggil data GET
    $jadual=$_GET['jadual'];
    $medan_kp=$_GET['medan_kp'];
    $kp=$_GET['kp'];
    
    # Arahan menghapuskan data
    $arahan_sql_hapus="delete from $jadual where $medan_kp='$kp'";
    
    # melaksanakan proses hapus rekod dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_hapus))
    {
        # Proses menghapus rekod berjaya
        echo"<script>alert('Hapus rekod berjaya');
        window.history.back();</script>";
    }
    else
    {
        # Proses menghapuskan rekod gagal
        echo"<script>alert('Hapus rekod gagal');
        window.history.back();</script>";
    }
}
?>