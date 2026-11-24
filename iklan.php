    <div class='w3-card-4'>
<div class="w3-bar w3-blue w3-mobile">
    <button class="w3-bar-item w3-button tablink w3-blue" onclick="opentab(event,'homestay')">
    Homestay</button>
    <button class="w3-bar-item w3-button tablink" onclick="opentab(event,'kemudahan')">
    Kemudahan</button>
    <button class="w3-bar-item w3-button tablink" onclick="opentab(event,'tempatmenarik')">
    Tempat-Tempat Menarik</button>
</div>
    
    <div id="homestay" class="w3-container w3-border city">
        <h2>Kategori</h2>
        <hr class='w3-teal w3-container'>
        <p><span class="w3-badge w3-grey">1</span>
        Single</p>
        <p><span class="w3-badge w3-grey">2</span>
        Couple</p>
        <p><span class="w3-badge w3-grey">3</span>
        Family</p>
    </div>
    
    <div id="kemudahan" class="w3-container w3-border city" style="display:none">
        <h2>Kemudahan Awam</h2>
        <hr class='w3-teal'>
        <p><span class="w3-badge w3-grey">1</span> Melaka Sentral<p>
        <p><span class="w3-badge w3-grey">2</span> Lapangan Terbang Antarabangsa Melaka</p>
        <p><span class="w3-badge w3-grey">3</span> Melaka Monorail</p>
        <p><span class="w3-badge w3-grey">4</span> Terminal Feri Antarabangsa Melaka</p>
        <p></p>
    </div>

    
  <div id="tempatmenarik" class="w3-container w3-border city" style="display:none">
    <h2>Tempat Menarik di Melaka</h2>
    <hr class='w3-teal w3-container'>
    <p><span class="w3-badge w3-grey">1</span> Muzium Kapal Selam</p>
    <p><span class="w3-badge w3-grey">2</span> Pantai Klebang</p>
    <p><span class="w3-badge w3-grey">3</span> Melaka River Park and Cruise</p>
    <p><span class="w3-badge w3-grey">4</span> A'Famosa</p>
  </div>
</div>

<script>
function opentab(evt, perkara) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.lenght; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-grey", "");
  }
  document.getElementById(perkara).style.display = "block";
  evt.currentTarget.className += " w3-blue=grey";
}
</script>