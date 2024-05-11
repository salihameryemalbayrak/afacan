<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa | AFACAN </title>

    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">


</head>

<body>
    <section id="menü">
        <div id="logo"> AFACAN</div>
        <nav>
            <a href="">Anasayfa</a>
            <a href="#oyunlar">Oyunlar</a>
            <a href="#iletisim">İletişim</a>
        </nav>
    </section>
    <section id="anasayfa">
        <div id="black"></div>
        <div id="içerik">
            <h2>AFACAN</h2>
            <hr width=300 align=left>
            <p>Oyunlar, çocukların yaratıcılığını, problem çözme becerilerini ve sosyal yeteneklerini geliştirirken eğlenmelerini sağlar.
</p>
        </div>
    </section>
    <section id="oyunlar">
        <div class="container">
            <h3>Oyunlar</h3>
            <div>
                <div class="card">
                    <img src="r2.jpeg" alt="" class="img-fluid" >
                    <a class="baslikcard" href="indexalg.html">bilgisayar mühendisliği</a>
                    
                    <p class="cardp">çocuklar kodlama oyunuyla algoritmik düşünme becerilerini geliştirir </p>
                </div>

                <div class="card">
                    <img src="r3.jpeg" alt="" class="img-fluid">
                    <a class="baslikcard" href="birlestirme.html">elektrik-elektronik mühendisliği</a>                   
                    <p class="cardp">mantıksal kapılar, düşünmeyi öğretir ve problem  çözme yeteneklerini geliştirir. </p>
                </div>

                <div class="card">
                    <img src="r4.jpeg" alt="" class="img-fluid">
                    <a class="baslikcard" href="*******">makine mühendisliği</a>    
                    <p class="cardp">çocuklar tamir aletlerini tanıyabilecekleri bu oyunla makine dünyasına ufak adımlar atar </p>
                </div>

            </div>
    </section>
    
    <section id="iletisim">
        <div class="container">
            <h2 id="h3iletisim">İletişim</h2>

            <form action="index.php" method="post">

            <div id="iletisimopak">
                <div id="formgroup">
                    <div id="solform">
                        <input type="text" name="isim" placeholder="adsoyad" required class="form-control">
                    </div>
                    <div id="sagform">
                        <input type="email" name="mail" placeholder="e-mail" required class="form-control">
                    </div>

                    <textarea name="mesaj" id="" cols="30" placeholder="mesajınızı giriniz" rows="10" required class="form-control"></textarea>
                    <input type="submit" value="gönder">
                </div>
            </div>
</form>
            <footer>
                <div id="copyright">2024 | Tüm Hakları Saklıdır</div>
                <a href=#menü> <b>/\</b> </a>
            </footer>
        </div>
    </section>



</body>

</html>

<?php

include("baglanti.php");
if(isset($_POST["isim"], $_POST["mail"], $_POST["mesaj"]))
{
    $adsoyad=$_POST["isim"];
    $email=$_POST["mail"];
    $mesaj=$_POST["mesaj"];

    $ekle="INSERT INTO iletişim (adsoyad, email, mesaj) VALUES ('".$adsoyad."','".$email."','".$mesaj."')";

    if($baglan->query($ekle)===TRUE)
    {
        echo"<script> alert('mesajınız başarı ile gönderilmiştir')</script>";
    }else{
        echo"<script> alert('mesajınız gönderilirken bir hata oluştu')</script>";
    }
}

?>