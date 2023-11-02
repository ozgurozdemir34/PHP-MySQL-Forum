
<?php
require("baglanti.php");
session_start();
$konubasligi=@$_GET["konubasligi"];
$kullaniciadi=$_SESSION["kullaniciadi"];
$kacinci=@$_GET["sayfa"];
if($kacinci==null){
    $kacinci=1;
}
elseif ($kacinci<1) {
    $kacinci=1;
}
else{
    $kacinci=@$_GET["sayfa"];
}
$sayfamesajsayisi=20;
$sayfalama=($kacinci*$sayfamesajsayisi)-$sayfamesajsayisi;



$mesajlar="SELECT mesaj FROM konular WHERE konubasligi='$konubasligi' LIMIT $sayfalama,$sayfamesajsayisi";
$mesajlarsorgu=mysqli_query($baglanti,$mesajlar);
$sayfabasimesaj="SELECT COUNT(*) FROM konular";
$sayfabasimesajsorgu=mysqli_query($baglanti,$sayfabasimesaj);
$sayfabasimesajgetir=mysqli_fetch_column($sayfabasimesajsorgu);    
$mesajlarigetir=mysqli_fetch_all($mesajlarsorgu);

echo"<h1> $konubasligi</h1>";



$sayfasayisi=ceil($sayfabasimesajgetir/$sayfamesajsayisi);

foreach ($mesajlarigetir as $mesajlarigetir1) {
   for ($i=0; $i<count($mesajlarigetir1) ; $i++) { 
$kimyazmis="SELECT yazankullanici FROM konular WHERE konubasligi='$konubasligi' AND mesaj='$mesajlarigetir1[$i]'";
$kimyazmissorgu=mysqli_query($baglanti,$kimyazmis);
$yazankullanici=mysqli_fetch_column($kimyazmissorgu);
    echo'<div class="container">
            ','<p class="mesaj">',$mesajlarigetir1[$i],'</p>',
            '<p class=yazankullanici>',$yazankullanici,'</p>
            
            ';
           
echo"</div>";          


   }
}
echo"<div style='margin-left:200'>";
for ($i=1; $i <$sayfasayisi ; $i++) { 
    echo"<a href='konu.php?konubasligi=$konubasligi&sayfa=$i'>$i</a>";
}
echo "</div>";
if($_SESSION["kullaniciadi"]!=null){
    require("mesaj.php");
}
?>
