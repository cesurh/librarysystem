<?php
    $sunucu_adi = "localhost";
    $kullanici_adi = "root";
    $sifre = "AdminOstator";
    $veri_tabani = "kutuphane";
    
    $baglanti = new mysqli($sunucu_adi, $kullanici_adi, $sifre, $veri_tabani, 3306);

    if($baglanti->connect_error)
        die("Bağlantı sağlanamadı:".$baglanti->connect_error);
    /*else
      echo "Bağlantı başarılı";*/


?>


<?php
$kategoris_err="";
$kitapadis_err="";
$yazaradis_err="";
$sayfasayis_err="";
$turus_err="";


if(isset($_POST["submite"]))

{
  

    
    // Email doğrulama
    if(empty($_POST["kategoris"]))
    {
      $kategoris_err="Kitap kategorisi boş geçilemez.";
    }
    else if(strlen($_POST["kategoris"])<3)
  {
    $kategoris_err="Kitap kategorisi  en az 3 karakter olmalıdır.";
  }
    else{
      $kategoris=$_POST[kategoris];
    }



     





   // Okul adı doğrulama
   if(empty($_POST["kitapadis"]))
   {
     $kitapadis_err="Kitap adı boş geçilemez.";
   }
   else if(strlen($_POST["kitapadis"])<2)
   {
     $kitapadis_err="Kitap adı en az 5 karakter olmalıdır.";
   }
   else if(strlen($_POST["kitapadis"])>43)
   {
     $kitapadis_err="Okul adı en fazla 43 karakter olmalıdır.";
   }
  
     else{
       $kitapadis=$_POST[kitapadis];
     }
 



    

       // Okul adı doğrulama
  if(empty($_POST["yazaradis"]))
  {
    $yazaradis_err="Yazar adı boş geçilemez.";
  }
  else if(strlen($_POST["yazaradis"])<4)
  {
    $yazaradis_err="Yazar adı en az 4 karakter olmalıdır.";
  }
  else if(strlen($_POST["yazaradis"])>50)
  {
    $yazaradis_err="Okul adı en fazla 50 karakter olmalıdır.";
  }
 
    else{
      $yazaradis=$_POST[yazaradis];
    }


   // Okul adı doğrulama
   if(empty($_POST["sayfasayis"]))
   {
     $sayfasayis_err="İsminizi girmelisiniz.";
   }  
     else{
       $sayfasayis=$_POST[sayfasayis];
     }
 







  if(isset($kategoris) && isset($kitapadis) && isset($yazaradis) && isset($sayfasayis))
  {


   
   
    $ekle="INSERT INTO `kitaplar` (`id`, `kategori`, `kitapadi`, `yazaradi`, `alan`, `tarih`) VALUES (NULL, '$kategoris', '$kitapadis', '$yazaradis', '$sayfasayis', CURRENT_Timestamp);";
    $calistirekle = mysqli_query($baglanti,$ekle);
    

    if($calistirekle) {
        echo '<div id="dv1" class="alert alert-success" role="alert">
        Kayıt başarılı bir şekilde eklendi, <a style="color:red;">Unutmayın Kitabınızı 15 Gün Sonra Teslim Etmelisiniz!</a>
      </div>';
    }
    else{
      echo '<div id="dv1" class="alert alert-danger" role="alert">
      Kaydınız eklenirken bir hata oluştu.
      Lütfen Tekrar Deneyin
    </div>';
    }

   
}
}

?>




<?php
$kategorir_err="";
$kitapadir_err="";
$yazaradir_err="";
$sayfasayir_err="";



if(isset($_POST["submitr"]))

{
  

    
    // Email doğrulama
    if(empty($_POST["kategorir"]))
    {
      $kategorir_err="Kitap kategorisi boş geçilemez.";
    }
    else if(strlen($_POST["kategorir"])<3)
  {
    $kategorir_err="Kitap kategorisi  en az 3 karakter olmalıdır.";
  }
    else{
      $kategorir=$_POST[kategorir];
    }



     





   // Okul adı doğrulama
   if(empty($_POST["kitapadir"]))
   {
     $kitapadir_err="Kitap adı boş geçilemez.";
   }
   else if(strlen($_POST["kitapadir"])<2)
   {
     $kitapadir_err="Kitap adı en az 5 karakter olmalıdır.";
   }
   else if(strlen($_POST["kitapadir"])>43)
   {
     $kitapadir_err="Okul adı en fazla 43 karakter olmalıdır.";
   }
  
     else{
       $kitapadir=$_POST[kitapadir];
     }
 



    

       // Okul adı doğrulama
  if(empty($_POST["yazaradir"]))
  {
    $yazaradir_err="Yazar adı boş geçilemez.";
  }
  else if(strlen($_POST["yazaradir"])<4)
  {
    $yazaradir_err="Yazar adı en az 4 karakter olmalıdır.";
  }
  else if(strlen($_POST["yazaradir"])>50)
  {
    $yazaradir_err="Okul adı en fazla 50 karakter olmalıdır.";
  }
 
    else{
      $yazaradir=$_POST[yazaradir];
    }


   // Okul adı doğrulama
   if(empty($_POST["sayfasayir"]))
   {
     $sayfasayir_err="İsminizi girmelisiniz.";
   }  
     else{
       $sayfasayir=$_POST[sayfasayir];
     }
 







  if(isset($kategorir) && isset($kitapadir) && isset($yazaradir) && isset($sayfasayir))
  {


   
   
    $ekle="INSERT INTO `teslim` (`id`, `kategori`, `kitapadi`, `yazaradi`, `alan`, `tarih`) VALUES (NULL, '$kategorir', '$kitapadir', '$yazaradir',
      '$sayfasayir', CURRENT_Timestamp);";
    $calistirekle = mysqli_query($baglanti,$ekle);
    

    if($calistirekle) {
        echo '<div id="dv1" class="alert alert-success" role="alert">
        Kayıt başarılı bir şekilde eklendi, <a style="color:red;">Unutmayın Kütüphanemiz 7/24 Kamera ile İzlenmektedir!</a>
      </div>';
    }
    else{
      echo '<div id="dv1" class="alert alert-danger" role="alert">
      Kaydınız eklenirken bir hata oluştu.
      Lütfen Tekrar Deneyin
    </div>';
    }

    
}
}

?>


<?php
$kategori_err="";
$kitapadi_err="";
$yazaradi_err="";
$sayfasayi_err="";



if(isset($_POST["submit"]))

{
  

    
    // Email doğrulama
    if(empty($_POST["kategori"]))
    {
      $kategori_err="Kitap kategorisi boş geçilemez.";
    }
    else if(strlen($_POST["kategori"])<3)
  {
    $kategori_err="Kitap kategorisi  en az 3 karakter olmalıdır.";
  }
    else{
      $kategori=$_POST[kategori];
    }



     





   // Okul adı doğrulama
   if(empty($_POST["kitapadi"]))
   {
     $kitapadi_err="Kitap adı boş geçilemez.";
   }
   else if(strlen($_POST["kitapadi"])<2)
   {
     $kitapadi_err="Kitap adı en az 5 karakter olmalıdır.";
   }
   else if(strlen($_POST["kitapadi"])>45)
   {
     $kitapadi_err="Kiatp adı en fazla 45 karakter olmalıdır.";
   }
  
     else{
       $kitapadi=$_POST[kitapadi];
     }
 



    

       // Okul adı doğrulama
  if(empty($_POST["yazaradi"]))
  {
    $yazaradi_err="Yazar adı boş geçilemez.";
  }
  else if(strlen($_POST["yazaradi"])<4)
  {
    $yazaradi_err="Yazar adı en az 4 karakter olmalıdır.";
  }
  else if(strlen($_POST["yazaradi"])>50)
  {
    $yazaradi_err="Yazar adı en fazla 50 karakter olmalıdır.";
  }
 
    else{
      $yazaradi=$_POST[yazaradi];
    }


   // Okul adı doğrulama
   if(empty($_POST["bagıslayan"]))
   {
     $sayfasayi_err="İsminizi girmelisiniz.";
   }  
     else{
       $bagıslayan=$_POST[bagıslayan];
     }
 







  if(isset($kategori) && isset($kitapadi) && isset($yazaradi) && isset($bagıslayan))
  {


   
   
    $ekle="INSERT INTO `bagıs` (`id`, `kategori`, `kitapadi`, `yazaradi`, `bagıslayan`, `tarih`) VALUES (NULL, '$kategori', '$kitapadi', '$yazaradi','$bagıslayan', CURRENT_Timestamp);";
    $calistirekle = mysqli_query($baglanti,$ekle);
    

    if($calistirekle) {
        echo '<div id="dv1" class="alert alert-success" role="alert">
        BAĞIŞINIZ Başarılı bir şekilde eklendi, <a style="color:red;">TEŞEKKÜRLER!</a>
      </div>';
    }
    else{
      echo '<div id="dv1" class="alert alert-danger" role="alert">
      Kaydınız eklenirken bir hata oluştu.
      Lütfen Tekrar Deneyin
    </div>';
    }

    
}
}

?>









<!DOCTYPE html>
<html>
  <head>    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">



    <style>
        /* Üstbilgi stilleri */
header {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f2f2f2;
  padding: 10px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  position: fixed;
  opacity: 0.7;
}
header:hover {
  opacity: 1.0;
}
#foto {
    height: 230px;
    width: 35%;
}

h1 {
  font-size: 25px;
  margin: 0;
}

nav ul {
  list-style: none;
  display: flex;
  margin: 0;
  padding: 0;
}

nav ul li {
  margin-right: 20px;
}

nav ul li:last-child {
  margin-right: 0;
}

nav ul li a {
  color: #333;
  text-decoration: none;
  font-size: 18px;
}

/* Hero stilleri */
.hero {
  background-image: url('https://anfanadolulisesi.meb.k12.tr/meb_iys_dosyalar/34/37/749595/resimler/2022_02/k_10135501_WhatsApp-Image-2022-02-10-at-12.11.48-1.jpg');
  background-size: cover;
  background-position: center;
  height: 500px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: #fff;
}

.hero h2 {
  font-size: 48px;
  margin: 0 0 20px 0;
  text-align: center;
  text-shadow: 2px 2px #000;
}

.hero p {
  font-size: 24px;
  margin: 0;
  text-align: center;
  text-shadow: 2px 2px #000;
}

.button {
  display: inline-block;
  padding: 10px 20px;
  border: 2px solid cyan;
  border-radius: 30px;
  background-color: transparent;
  color: #000;
  font-size: 18px;
  text-decoration: none;
  margin-top: 20px;
  
  transition: all 0.3s;
}
.button:hover {
  background-color: cyan;
}




/* Kurslar stilleri */



.explore:hover {
    background-color: grey;
    transition: all 0.3s;
    opacity: 5.0;
}

.logo {
  height: 55;
  width: 15%;
}
.logo:hover {
  opacity: ;
}

    </style>
  </head>
  <body>
<center>
    <header>
    <img src="https://cdn.discordapp.com/attachments/958061884404297770/1078018688608907325/1677090076734.jpg" class="send" id="logo" alt="Logo" style="width: 13%; height: 75px;" />
      <nav>
        <ul>
        <div class="btn-group" style="border-radius: 10px;" name="grup"  role="group" aria-label="Basic outlined example">
  <li>created by   <button type="button" name="Astronom"  style="border-radius: 90px;" class="btn btn-outline-danger"> Cesur Huseynzade</button></li>
  
        </ul>
      </nav>
    </header>
</center>
    <section class="hero">
      <h2>Abidin Nesimi Fatinoğlu Anadolu Lisesi</h2>
      <p>Yeni Kütüphane Sistemiyle Kullanıcı Dostu Arayüz!!.</p>
      <a href="https://anfanadolulisesi.meb.k12.tr/tema/index.php" class="button" id="explore" style="color: #fff;">Keşfet</a>
    </section>
  
   


<br>
<br>
<br>
<div class="container">
<div class="row">
    <div class="col-md-12 text-center" id="image-section" >
      <img src="https://cdn.discordapp.com/attachments/958061884404297770/1078018688608907325/1677090076734.jpg" alt="Resim Açıklaması" id="foto" style="width: 500px; heigth: 1500;">
    </div>
  </div>
  </div>
           
          
  </body>


































































    
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
       setTimeout(function() { $('#dv1').hide(); }, 5000); /*1000 milisaniye = 1 saniye*/
   </script> 




<html lang="tr" dir="TR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">
    <link rel="icon" href="" type="image/x-icon" />
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title>Kütüphane</title>







    
    <style>
        /* Üstbilgi stilleri */


body {
    background-color: #4E4E4E;
            /* make sure IE centers the page too */
}

 
td {
    padding: 5px;
}
#exampleInputEmail1 {
  text-align: left;  
}
 

#divi {
  position: ; 
  position: top;  
  text-align: center;
  overflow: auto;
  height: 450px;
  weight: 50px ;
  width: 13%;
  border-radius: 90px;
  animation: fadeOut 5s;
}



      








    body {
    
}



.tamam {
  background-color: ;
  float:left;
  weight:40px;
  height:40px;
}
.send {
  float:left;
  weight:140px;
  height:60px;

}

#box {
max-width: 950px;
position: relative;
float: center;

}
#box .fa-search {
position: absolute;
top: 14px;
left: 12px;
font-size: 20px;
color:cornflowerblue;
}
#search {
width: 950px;
box-sizing: border-box;
border: 2px solid cornflowerblue;
border-radius: 40px;
font-size:18px;
padding: 12px 20px 12px 40px;
-moz-transition: width 0.4s ease-out-in;
-o-transition: width 0.4s ease-out-in;
-webkit-transition: width 0.4s ease-in-out;
transition: width 0.4s ease-in-out;
}
#search:focus {
width: 100%;
}
.button-container {
  display: flex;
  justify-content: space-between;
  width: 100%;
}
.button-container a:last-child {
  flex-basis: calc(33.33% - 0px);
}
.button-container button {
  flex-basis: calc(33.33% - 10px);
}

 
   
   </style>
  </head>
  
  
  

  
  <br>
  <br>
  <center><h1 style="color:red;">E-Kütüphanemize hoş geldiniz!</h1></center>
  
  <body  style="background-color: lightgrey;">
  <br>
  <br>







  <center><div  style="display: ; position: none; " class="container p-5">
        <div style="box-shadow: 2px 5px 3px limegreen; position: none; " class="card p-5">
        <center><h5 style="color: grey; ">Kullanıcı Dostu Arayüz!</h5></big></center>
        <div class="button-container">
  <center>

<button type="button" id="arey"  name="Astronomi" style="position: none;" onclick="gizleGoster('sonuc');" class="btn btn-outline-primary"><a style="color:white;"></a>
<style>
.onyuz
{
  position: none;
  border-radius: 35px;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  -moz-transform: scale(1);
  transition: all .3s ease-in;
  -moz-transition: all .3s ease-in;
  -webkit-transition: all .3s ease-in;
  -ms-transition: all .3s ease-in;
  float: left;
}
.onyuz:hover
{
  z-index: index 1;;
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);  
  -moz-transform: scale(1.1);
  transform: scale(1.1);
}
.Astronomi
{
  
  position: none;
  border-radius: 35px;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  -moz-transform: scale(1);
  transition: all .3s ease-in;
  -moz-transition: all .3s ease-in;
  -webkit-transition: all .3s ease-in;
  -ms-transition: all .3s ease-in;
}
.Astronomi:hover
{
  z-index: index 1;;
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);  
  -moz-transform: scale(1.1);
  transform: scale(1.1);
}

</style> <center> <br><h4>Kitap Bağışı Yap<a style="color:lightblue;">!</a></h4>
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/zgogqkqu.json"
    trigger="hover"
    colors="primary:#4be1ec,secondary:#cb5eee"
    stroke="39"
    style="width:250px;height:250px">
</lord-icon>
  
</center>
</button>
<script>
function gizleGoster(ID) {
var secilenID = document.getElementById(ID);
if (secilenID.style.display == "none") {
  secilenID.style.display = "";
} else {
  secilenID.style.display = "none";
}
}
</script>





&nbsp;&nbsp;
















<button type="button" id="arey" title="ANF Kütüphanesi" style="position: none; float: right;" onclick="gizleGoster('sonuc3');"   name="Astronomi" class="btn btn-outline-success"><a style="color:white;"></a>
<style>


.onyuz
{
  position: ;
  border-radius: 35px;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  -moz-transform: scale(1);
  transition: all .3s ease-in;
  -moz-transition: all .3s ease-in;
  -webkit-transition: all .3s ease-in;
  -ms-transition: all .3s ease-in;
  float: left;
}
.onyuz:hover
{
  z-index: index 1;;
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);  
  -moz-transform: scale(1.1);
  transform: scale(1.1);
}
.Astronomi
{
  position: ;
  border-radius: 35px;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  -moz-transform: scale(1);
  transition: all .3s ease-in;
  -moz-transition: all .3s ease-in;
  -webkit-transition: all .3s ease-in;
  -ms-transition: all .3s ease-in;
}
.Astronomi:hover
{
  z-index: index 1;;
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);  
  -moz-transform: scale(1.1);
  transform: scale(1.1);
}
</style> <center> <br><h4 >Ödünç Al<a style="color:lightcyan;">!</a></h4>
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/hursldrn.json"
    trigger="morph"
    style="width:250px;height:250px">
</lord-icon>
  
</center>
</button>


&nbsp;&nbsp;


<button type="button" id="arey"  name="Astronomi" style="position: none;"  onclick="gizleGoster('sonuc4');" class="btn btn-outline-danger"><a style="color:white;"></a>
<style>
.onyuz
{
  position: none;
  border-radius: 35px;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  -moz-transform: scale(1);
  transition: all .3s ease-in;
  -moz-transition: all .3s ease-in;
  -webkit-transition: all .3s ease-in;
  -ms-transition: all .3s ease-in;
  float: left;
}
.onyuz:hover
{
  z-index: index 1;;
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);  
  -moz-transform: scale(1.1);
  transform: scale(1.1);
}
.Astronomi
{
  
  position: none;
  border-radius: 35px;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  -moz-transform: scale(1);
  transition: all .3s ease-in;
  -moz-transition: all .3s ease-in;
  -webkit-transition: all .3s ease-in;
  -ms-transition: all .3s ease-in;
}
.Astronomi:hover
{
  z-index: index 1;;
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);  
  -moz-transform: scale(1.1);
  transform: scale(1.1);
}

</style> <center><br> <h4>Kitabını Teslim Et<a style="color:lightblue;">!</a></h4>
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/alnsmmtf.json"
    trigger="hover"
    style="width:250px;height:250px">
</lord-icon>
</button>
<br><br><h5 style="color: red;">Kitap Teslim Ederken Veya Ödünç Alırken Kaydet Butonuna Bastıktan Sonra Onay Mesajı gelmiyorsa Yeniden Deneyin!</h5>
</center>

</div>
</div>
</div>
</div>
</center>



<center>
<div id="sonuc3"  style="background-color: #fff;
    border: 3px solid #000;
    float: center;
    font-family: Arial;
    padding: 20px 30px;
    text-align: left;
    width: 56%;
     height: 570px;               /* fill up the entire div */
    border-radius: 20px; display: none; " >
    <center><h2>Kitap Ödünç Al</h2></center>

<form action="okul.php"  method="POST" enctype="multipart/form-data">
            

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kitap Kategorisi</label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($kategoris_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="kategoris" maxlength="35" minlength="4">
                <div class="invalid-feedback">
        <?php 
      echo $kategoris_err;  
        ?>
      </div>
            </div>



            


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kitap Adı</label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($kitapadis_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="kitapadis" >
                <div class="invalid-feedback">
        <?php 
      echo $kitapadis_err;  
        ?>
      </div>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Yazar Adı</label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($yazaradis_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="yazaradis" maxlength="60">
                <div class="invalid-feedback">
        <?php 
      echo $yazaradis_err;  
        ?>
      </div>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><a style="color:blue;">Ödünç Alan İsmi</a></label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($sayfasayis_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="sayfasayis" maxlength="65" placeholder="İsim Soyisim / Sınıf / Numara">
                <div class="invalid-feedback">
        <?php 
      echo $sayfasayis_err;  
        ?>
      </div>
            </div>
            <br>


            
<div class="d-grid gap-2 col-6 mx-auto">
    <button type="submite" name="submite" style="font-size: 25px;" align="center" class="btn btn-primary">Kaydet</button>
 </div>
           
  </div>          
</form>

</center>





<center>
<div id="sonuc4"  style="background-color: #fff;
    border: 3px solid #000;
    float: center;
    font-family: Arial;
    padding: 20px 30px;
    text-align: left;
    width: 56%;
     height: 570px;               /* fill up the entire div */
    border-radius: 20px; display: none; " >
    <center><h2>Kitabını Teslim Et</h2></center>

<form action="okul.php"  method="POST" enctype="multipart/form-data">
            

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kitap Kategorisi</label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($kategorir_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="kategorir" maxlength="35" minlength="4">
                <div class="invalid-feedback">
        <?php 
      echo $kategorir_err;  
        ?>
      </div>
            </div>



            


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kitap Adı</label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($kitapadir_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="kitapadir" >
                <div class="invalid-feedback">
        <?php 
      echo $kitapadir_err;  
        ?>
      </div>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Yazar Adı</label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($yazaradir_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="yazaradir" maxlength="60">
                <div class="invalid-feedback">
        <?php 
      echo $yazaradir_err;  
        ?>
      </div>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><a style="color:blue;">Ödünç Alan İsmi</a></label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($sayfasayir_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="sayfasayir" maxlength="65" placeholder="İsim Soyisim / Sınıf / Numara">
                <div class="invalid-feedback">
        <?php 
      echo $sayfasayir_err;  
        ?>
      </div>
            </div>
            <br>


            
<div class="d-grid gap-2 col-6 mx-auto">
    <button type="submitr" name="submitr" style="font-size: 25px;" align="center" class="btn btn-primary">Kaydet</button>
 </div>
           
  </div>          
</form>

</center>












<center>

<div id="sonuc"  style="background-color: #fff;
    border: 3px solid #000;
    float: center;
    font-family: Arial;
    padding: 20px 30px;
    text-align: left;
    width: 56%;
     height: 570px;               /* fill up the entire div */
    border-radius: 20px; display: none; " >
   <center> <h3 style="color:red;">Kitap Bağışı Yap</h3></center>
   <br>

<form action="okul.php"  method="POST" enctype="multipart/form-data">
            

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kitap Kategorisi</label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($kategori_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="kategori" maxlength="35" minlength="4">
                <div class="invalid-feedback">
        <?php 
      echo $kategori_err;  
        ?>
      </div>
            </div>



            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kitap Türü</label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($tur_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="turu" maxlength="35" minlength="3">
                <div class="invalid-feedback">
        <?php 
      echo $tur_err;  
        ?>
      </div>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kitap Adı</label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($kitapadi_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="kitapadi" >
                <div class="invalid-feedback">
        <?php 
      echo $kitapadi_err;  
        ?>
      </div>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Yazar Adı</label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($yazaradi_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="yazaradi" maxlength="60">
                <div class="invalid-feedback">
        <?php 
      echo $yazaradi_err;  
        ?>
      </div>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><a style="color:blue;">Bağışlayan Adı</a></label>
                <input type="text" class="form-control 
                
                <?php
                if(!empty($sayfasayi_err))
                {
                  echo "is-invalid";
                }
                ?>
                "
                id="exampleInputEmail1" name="bagıslayan" maxlength="60">
                <div class="invalid-feedback">
        <?php 
      echo $sayfasayi_err;  
        ?>
      </div>
            </div>
            <br>


            
<div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" name="submit" style="font-size: 25px;" align="center" class="btn btn-primary">Kaydet</button>
 </div>
           
  </div>          
</form>
<br>




<br>






<br><br>




<br><br><br>
        
        

</center>



<center>
    <div style="background-color: darkgrey; font-size: 18px; color: darkcyan; border-radius: 0; box-shadow: 2px 5px 3px limegreen; font-color: white;" class="card p 9 " id="footer" align="center">
        <p>2023. ANF e-Kütüphane Sistemi. ©Tüm hakları saklıdır. Created by <a href="#" rel="nofollow">Cesur Huseynzade</a>.</p>
    </div></center>
    </html>