<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    Kullanıcı Adı:<input type="text" name="kullaniciadi">
    Şifre:<input type="password" name="sifre">
    Şifre tekrar:<input type="password" name="sifretekrar">
    Email:<input type="email" name="email">
    <input type="submit" name="kaydol" value="Kaydol">
</form>
</body>
</html>

<?php
require("baglanti.php");
if(isset($_POST["kaydol"])){
    $kullaniciadi=$_POST["kullaniciadi"];
    $sifre=$_POST["sifre"];
    $sifretekrar=$_POST["sifretekrar"];
    $email=$_POST["email"];
    $kayitvarmi="SELECT*FROM kullanici WHERE kullaniciadi='$kullaniciadi'";
    $kayitvarmisorgu=mysqli_query($baglanti,$kayitvarmi);
    if(mysqli_num_rows($kayitvarmisorgu)>0){
        echo"Aynı adda kayıt zaten var";
    }
    else{
        if($kullaniciadi==null or $sifre==null or $email==null or $sifretekrar==null){
            echo"Lütfen bütün alanları doldurun";
        }
        elseif($sifre!=$sifretekrar){
          echo"Şifreler uyuşmuyor";
        }
        elseif(strlen($sifre)<6){
            echo"Şifreniz en az 6 karakterli olmalı";
        }
        else{
            $kayitid="SELECT COUNT(*) FROM kullanici";
            $kayitidsorgu=mysqli_query($baglanti,$kayitid);
            $kayitidgetir=mysqli_fetch_row($kayitidsorgu);
            $esasid=$kayitidgetir[0]+1;
            $kaydet="INSERT INTO kullanici(kullaniciadi,sifre,id,email,aktifmi) VALUES('$kullaniciadi','$sifre','$esasid','$email',false)";
            $kaydetsorgu=mysqli_query($baglanti,$kaydet);
            if($kaydetsorgu){
             echo"Kaydınız başarıyla oluşturuldu";
            }
        }
    }
}

?>