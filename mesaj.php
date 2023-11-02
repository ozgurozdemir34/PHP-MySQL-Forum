<?php
require("baglanti.php");
date_default_timezone_set("Europe/Istanbul");
?>
<form action="" method="post">
<textarea name="mesaj" style="margin-left:200px;resize:none;" cols="92" rows="10" style="resize: none;"></textarea>
<br>
<input type="submit" class="btn btn-success" style="margin-left:200px;" name="gonder" value="Gönder">
</form>
<?php
if (isset($_POST["gonder"])) {
    if(strlen($_POST["mesaj"])<10){
     echo"Mesajınız en az 10 karakterli olmalıdır";
    }
    else{
    $_SESSION["kullaniciadi"]=$kullaniciadi;
    $mesaj=$_POST["mesaj"];
    $tarih=date("Y-m-d H-i-s");
    $konubasligi=@$_GET["konubasligi"];
    $mesajkaydet="INSERT INTO konular(konubasligi,tarih,mesaj,yazankullanici) VALUES('$konubasligi','$tarih','$mesaj','$kullaniciadi')";
    $mesajkaydetsorgu=mysqli_query($baglanti,$mesajkaydet);
    if($mesajkaydetsorgu){
        header("Refresh:1");
    }
}
}
?>

