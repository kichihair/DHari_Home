<!--Memanggil fail header-->
<?PHP include ('header.php'); ?>
<!-- menyediakan 1 row dan 2 column-->
<div class='w3-row w3-margin'>
    <!-- column pertama-->
    <div class='w3-quarter w3-container w3-margin-bottom'>
        <div class='w3-container w3-card-2 w3-blue '>
            <h4 class='w3-tulisan-p2'>Tempahan</h4>
        </div>
        <div class='w3-container w3-card-2 w3-white'>
        <form class='w3-form w3-margin-bottom' action='tempahan_senarai.php' method='POST'>
        <label class='w3-tulisan-p2'>Tarikh Masuk</label>
        <input type='date' name='TarikhMasuk' class='w3-input w3-border w3-round-xlarge
w3-large' required value='<?PHP echo $TarikhMasuk;?>'min='<?PHP echo $TarikhMasuk;?>'>
        <label class='w3-tulisan-p2'>Tarikh Keluar</label>
        <input type='date' name='TarikhKeluar' class='w3-input w3-border w3-round-xxlarge
w3-large' required value='<?PHP echo $TarikhKeluar;?>' min='<?PHP echo $TarikhKeluar;?>'>
                <h4> </h4>
                <button class="w3-button w3-block w3-blue-grey w3-round-xxlarge">Cari</button>
            </form>
        </div>
    </div>
    <!-- column kedua-->
    <div class='w3-threequarter w3-container w3-margin-bottom'>
        <?PHP include('iklan.php'); ?>
    </div>
</div>

<?PHP include('iklan2.php'); ?>

<?PHP include('footer.php'); ?>