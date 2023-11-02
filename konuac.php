<?php
require("baglanti.php");
$bolum=$_GET["bolum"];
$kullanici=$_SESSION["kullaniciadi"];
date_default_timezone_set("Europe/Istanbul");
?>

<form action="" method="post">
Konu başlığını giriniz:<input type="text" name="konubasligi">
<br>
<textarea name="konumesaji" cols="30" rows="10">Konu mesajını giriniz</textarea>
<input type="submit" name="konuac" value="Konu aç">

</form>
<?php
if(isset($_POST["konuac"])){
if (strlen($_POST["konubasligi"])<10) {
    echo"Konu başlığı en az 10 karatkerli olmalıdır";
}    
elseif (strlen($_POST["konumesaji"])<10) {
    echo"Konu mesajı en az 10 karakter olmalıdır";
}
else{    
$tarih=date("Y-m-d H-i-s");
$konubasligi=$_POST["konubasligi"];
$konumesaji=$_POST["konumesaji"];
$konuac="INSERT INTO konular(konubasligi,mesaj,tarih,acankullanici,bolum,yazankullanici) VALUES('$konubasligi','$konumesaji','$tarih,','$kullanici','$bolum','$kullanici')";
$konuacsorgu=mysqli_query($baglanti,$konuac);
if($konuac){
    header("Location:konu.php?konubasligi=$konubasligi&sayfa=1");
}
}
}
?>