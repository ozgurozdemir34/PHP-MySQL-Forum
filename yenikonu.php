<?php
require("baglanti.php");
session_start();
echo $_SESSION["kullaniciadi"];
if($_SESSION["kullaniciadi"]==null){
    echo'<a href="giris.php">Önce giriş yapmalısınız</a>';
}
else{
require("konuac.php");
}
?>

