<?php
require("baglanti.php");
session_start();
if($_SESSION["kullaniciadi"]==null){
    echo"Hoşgeldin";
    echo"<br>";
    echo'<a href="giris.php">Giriş yapmak için tıkla</a>';
    require("forum.php");
}


else{
    echo"Hoşgeldin"," ",$_SESSION["kullaniciadi"];
    echo'<form action="" method="post">
    <input type="submit" class="btn btn-danger" name="cikis" value="Çıkış">';
    echo"<br>";
    require("forum.php");

}


?>

<?php
if(isset($_POST["cikis"])){
    session_destroy();
    header("Location:forumanasayfa.php");
}

?>