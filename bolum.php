
<?php
require("baglanti.php");
session_start();
$kullaniciadi=$_SESSION["kullaniciadi"];
$bolum=@$_GET["bolum"];
$konu="SELECT DISTINCT konubasligi FROM konular WHERE bolum='$bolum'ORDER BY tarih DESC";
$konularsorgu=mysqli_query($baglanti,$konu);
$konugetir=mysqli_fetch_all($konularsorgu);

    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  
</head>
<body style="text-align:center;">
    <h1>Konular</h1>
    <?php
    
           
            foreach ($konugetir as $konugetir1)
            {

               foreach ($konugetir1 as $konugetir2) {
                echo"<a href='konu.php?konubasligi=$konugetir2&sayfa=1'>$konugetir2</a>";
                echo"<br>";        
                        
         
                        
              
               }
             
            }
            ?>
              <form action="" method="post">
        <input type="submit" class="btn btn-success" name="yenikonu" value="Yeni konu aç">
    </form>
             <?php
            if(isset($_POST["yenikonu"])){
                header("Location:yenikonu.php?bolum=$bolum&sayfa=1");
            }
            
      
    ?>
</body>
</html>