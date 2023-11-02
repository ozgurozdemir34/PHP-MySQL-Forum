<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="form-outline w-25" class="ms-1" >
        Kullanıcı Adı:<input type="text" class="form-control" name="kullaniciadi">
        Şifre:<input type="password" class="form-control" name="sifre"> 
        </div>      
        <input type="submit" class="btn btn-success" name="giris" value="Giriş Yap">
    </form>
</body>
</html>

<?php

session_start();
require("baglanti.php");
echo"<br>";

?>
<a href="kayit.php">Kayıt olmak için tıklayınız</a>
<?php
if(isset($_POST["giris"])){
$kullaniciadi=$_POST["kullaniciadi"];
$sifre=$_POST["sifre"];   
$giris="SELECT*FROM kullanici WHERE kullaniciadi='$kullaniciadi' AND sifre='$sifre'";
$girissorgu=mysqli_query($baglanti,$giris);
if(mysqli_num_rows($girissorgu)==1){
    $_SESSION["kullaniciadi"]=$kullaniciadi;
    header("Location:forumanasayfa.php");

}
else{
    echo"Lütfen tekrar deneyiniz";
}
}

?>