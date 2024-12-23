<?php
session_start();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Climassist | Yedek Parça, Montaj, Bakım</title>
  <meta name="description"
  content="Samsung VRF ve diğer ticari/bireysel klima ürünleri için yedek parça, montaj ve bakım hizmeti ihtiyaçlarınız için iletişime geçebilirsiniz. Kompröser, fan motoru, elektronik kart, sensör, kumanda ve daha fazla yedek parça için teklif isteyiniz. Tüm Türkiye için sevk ve servis operasyonumuz mevcuttur.">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
  <!-- Favicons -->
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <meta content="tr" http-equiv="Content-Language">
  <meta name="description" content="Samsung VRF ve diğer ticari/bireysel klima ürünleri için yedek parça, montaj ve bakım hizmeti ihtiyaçlarınız için iletişime geçebilirsiniz. Kompröser, fan motoru, elektronik kart, sensör, kumanda ve daha fazla yedek parça için teklif isteyiniz. Tüm Türkiye için sevk ve servis operasyonumuz mevcuttur.">
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Özel CSS -->
  <link href="style.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

</head>

<body>
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:info@climassist.com">info@climassist.com</a>
        <i class="bi bi-phone"></i> +90 212 699 99 95
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/climassist_logo.png" alt="Logo" style="height: 35px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- Merhaba Kullanıcı Butonu -->
                        <li class="nav-item">
                            <a href="#" class="btn btn-primary ms-3" style="pointer-events: none;">
                                Merhaba, 
                                <?php 
                                echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : "Kullanıcı";
                                echo " ";
                                echo isset($_SESSION['user_surname']) ? htmlspecialchars($_SESSION['user_surname']) : "";
                                ?>
                            </a>
                        </li>
                        <!-- Çıkış Yap Butonu -->
                        <li class="nav-item">
                            <a href="logout.php" class="btn btn-primary ms-3">Çıkış Yap</a>
                        </li>
                        <!-- Şifreyi Yenile Butonu -->
                        <li class="nav-item">
                            <a href="reset_password.php" class="btn btn-primary ms-3">Şifreyi Yenile</a>
                        </li>
                        <!-- Taleplerimi Görüntüle Butonu -->
                        <li class="nav-item">
                            <a href="show_request.php" class="btn btn-primary ms-3">Taleplerimi Görüntüle</a>
                        </li>
                        <!-- Adminler İçin Kullanıcı Ekle Butonu -->
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'Admin'): ?>
                            <li class="nav-item">
                                <a href="add_user.php" class="btn btn-primary ms-3">Kullanıcı Ekle</a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Giriş ve Kayıt Ol Butonları -->
                        <li class="nav-item">
                            <a href="login.php" class="btn btn-primary ms-3">Giriş Yap</a>
                        </li>
                        <li class="nav-item">
                            <a href="register.php" class="btn btn-primary ms-3">Kayıt Ol</a>
                        </li>
                        <!-- Kod ile Takip Butonu -->
                        <li class="nav-item">
                            <a href="code_track.php" class="btn btn-primary ms-3">Kod ile Takip</a>
                        </li>
                    <?php endif; ?>
                    <!-- Talep Oluştur Butonu -->
                    <li class="nav-item">
                        <a href="request_form.php" class="btn btn-primary ms-3">Talep Oluştur</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




 <!-- Hero Start -->
 <section id="hero" class="d-flex align-items-center">
  <div class="container">
    <h1>Merhabalar,</h1>
    <h2>Size nasıl yardımcı olabiliriz?</h2><br>
    <p>Samsung klimalarınızın ihtiyaç duyabileceği orijinal yedek parçalar ve hizmetler için seçim yaparak hızlı bir başlangıç yapabilirsiniz.</p>
    <a href="request_form.php" class="btn-get-started scrollto">Bakım teklifi almak istiyorum</a>
    <a href="request_form.php" class="btn-get-started scrollto">Servis talebim var</a>
  </div>
</section>
<!-- End Hero -->

<!-- Start NedenBiz -->
<section id="why-us" class="why-us">
  <div class="container">

    <div class="row">
      <div class="col-lg-4 d-flex align-items-stretch">
        <div class="content">
          <h3>Neden Climassist?</h3>
          <p>
              Samsung sistem klimalar hakkında geçmişten bugüne uzanan tecrübemiz ile kurulum, bakım ve onarım konularında yetenekli ve bilgili profesyonel bir ekibiz.
              Markamızı genel olarak, deneyimli teknik ekip, teknik uzmanlık, detaylara dikkat, problem çözme becerileri, müşteri hizmetleri becerileri ve güvenirlik bilincinin bir kombinasyonu olarak niteleyebiliriz.
          </p>
          <div class="text-center">
            <a href="#" class="more-btn">Hakkımızda <i class="bx bx-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-8 d-flex align-items-stretch">
        <div class="icon-boxes d-flex flex-column justify-content-center">
          <div class="row">
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i class="bx bx-task"></i>
                <h4>Bakım Hizmeti</h4>
                <p>Klima bakımı, ünitelerin verimli ve etkin bir şekilde çalışmasını sağlamak için önemlidir. Ünitelerin temizlenmesi, kablolama kontrolleri, soğutucu akışkan kontrolü ve performans değerlendirmesi ile sorunlu veya sorun yaratabilecek parçaların tespiti yapılır.</p>
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i class="bx bx-analyse"></i>
                <h4>Yedek Parça</h4>
                <p>Klima üniteleri, aşınma ve yıpranma veya diğer sorunlar nedeniyle zaman zaman değiştirilmesi gerekebilecek bir dizi bileşen içerir. Orijinal yedek parçalar ürününüzün ilk günkü performansına dönmesini sağlar.</p>
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i class="bx bx-wrench"></i>
                <h4>Montaj hizmeti</h4>
                <p>VRF sistem kurulumu karmaşık bir süreçtir ve eğitimli ve deneyimli bir ekip tarafından gerçekleştirilmelidir. Sistemin doğru şekilde kurulduğundan ve verimli bir şekilde çalıştığından emin olmak için tüm güvenlik yönergelerine uyulması ve uygun kurulum tekniklerinin kullanılması önemlidir.</p>
              </div>
            </div>
          </div>
        </div><!-- End .content-->
      </div>
    </div>

  </div>
</section>
 <!-- End NedenBiz -->

  <!-- ======= About Section ======= -->
   <section id="about" class="about">
    <div class="container-fluid">

      <div class="row">
        <div class="col-xl-5 col-lg-6 justify-content-center d-flex flex-column">
          <img src="img/fingerprint.jpg">
        </div>

        <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
          <h3>Tesisinizi sizin kadar önemseriz!</h3>
          <p>Mekanik ekipman bakım ve onarımlarında bize duydukları güven ve uzun süreli partnerlikleri için müşterilerimize teşekkür ederiz. Bunun farkında olarak tesislerin sürekliliği ve verimliliği için çalışmalarımıza hız kesmeden devam ediyoruz.</p>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-fingerprint"></i></div>
            <h4 class="title"><a href="">Ekipmanlarınızın ihtiyacı olan bakımı uygularız&nbsp;&nbsp;</a></h4>
            <p class="description">Ürün türüne ve&nbsp; özelliklerine göre izlenmesi gereken bakım rutinleri itina ile uygulanarak konfor şartlarının sürekliliği sağlanır&nbsp; &nbsp;</p>
          </div>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-lira"></i></div>
            <h4 class="title"><a href="">Ekonomik ömrüne katkı sağlarız</a></h4>
            <p class="description">Her mekanik ekipman gibi iklimlendirme ürünleri de bakıma ihtiyaç duymaktadır. Periyodik olarak yapılacak bakımlar cihazlarınızın ekonomik ömrünü uzatarak daha uzun süreler faydalanmanızı sağlayacaktır.</p>
          </div>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-line-chart-down"></i></div>
            <h4 class="title"><a href="">Dönüşümlü major-minör bakımlar&nbsp;</a></h4>
            <p class="description">Bu dönüşümle cihazlarınızın ekonomik ömrü uzayacağı gibi ürünleriniz sürekli kontrolü neticesinde erken teşhis yapılır, yedek parça bütçenizden tasarruf edersiniz.&nbsp; &nbsp;</p>
          </div>

        </div>
      </div>

    </div>
  </section>
  <!-- End About Section -->
     
  <!-- ======= Counts Section ======= -->
     <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-building"></i>
              <span data-purecounter-start="0" data-purecounter-end="850" data-purecounter-duration="3" class="purecounter"></span>
              <p>Müşteri</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
              <p>Yedek Parça</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <span data-purecounter-start="0" data-purecounter-end="3000" data-purecounter-duration="1" class="purecounter"></span>
              <p>Servis Hizmeti</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="11500" data-purecounter-duration="1" class="purecounter"></span>
              <p>Bakım alan ünite</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Counts Section -->

     <!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
  <div class="container">
      <div class="section-title">
          <h2>Neden bizi seçmelisiniz</h2>
      </div>
  </div>

  <div class="container-fluid">
      <div class="row g-0">

          <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                  <a href="img/gallery_images/img_1.jpg" class="galelry-lightbox">
                      <img src="img/gallery_images/img_1.jpg" alt="" class="img-fluid">
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                  <a href="img/gallery_images/img_2.jpg" class="galelry-lightbox">
                      <img src="img/gallery_images/img_2.jpg" alt="" class="img-fluid">
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                  <a href="img/gallery_images/img_3.jpg" class="galelry-lightbox">
                      <img src="img/gallery_images/img_3.jpg" alt="" class="img-fluid">
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                  <a href="img/gallery_images/img_4.jpg" class="galelry-lightbox">
                      <img src="img/gallery_images/img_4.jpg" alt="" class="img-fluid">
                  </a>
              </div>
          </div>
<div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                  <a href="img/gallery_images/img_5.jpg" class="galelry-lightbox">
                      <img src="img/gallery_images/img_5.jpg" alt="" class="img-fluid">
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                  <a href="img/gallery_images/img_6.jpg" class="galelry-lightbox">
                      <img src="img/gallery_images/img_6.jpg" alt="" class="img-fluid">
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                  <a href="img/gallery_images/img_7.jpg" class="galelry-lightbox">
                      <img src="img/gallery_images/img_7.jpg" alt="" class="img-fluid">
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                  <a href="img/gallery_images/img_8.jpg" class="galelry-lightbox">
                      <img src="img/gallery_images/img_8.jpg" alt="" class="img-fluid">
                  </a>
              </div>
          </div>

      </div>

  </div>
</section>
<!-- End Gallery Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>İletişim</h2>
    </div>
  </div>

  <div>
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.0928272446413!2d28.869414176530974!3d41.06696351580843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab00f654f4e6f%3A0x6356d8e1c4c9306d!2sClimassist%20%7C%20Ozz%20Mühendislik!5e0!3m2!1str!2str!4v1723722832372!5m2!1str!2str" frameborder="0" allowfullscreen></iframe>
  </div>

  <div class="container">
    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Adres:</h4>
            <p>Oruç Reis Mah. Giyimkent 8. Sokak No:45A Esenler/İstanbul</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>info@climassist.com</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Telefon:</h4>
            <p>+90 212 699 99 95</p>
          </div>

        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Adınız" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email Adresiniz" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Konu" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Mesaj" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Mesajı Gönder</button></div>
        </form>

      </div>

    </div>

  </div>
</section>
<!-- End Contact Section -->
</main>
<!-- End #main -->
 <!-- ======= Footer ======= -->
 <footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>Climassist</h3>
          <p>
            Oruçreis Mah. Giyimkent 8. Sokak<br>
            No:45A Esenler<br>
            Istanbul <br><br>
            <strong>Telefon:</strong> +90 212 699 9995<br>
            <strong>Eposta:</strong> info@climassist.com<br>
          </p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Linkler</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Hizmetlerimiz</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Eposta kaydet</h4>
          <p>Duyurularımızdan haberdar olmak için katılabilirsiniz.</p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Abone Ol">
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><span>Climassist</span></strong>. Tüm hakları saklıdır.
      </div>
      <div class="samsung_logo-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 16" focusable="false">
                          <g fill="none" fill-rule="evenodd">
                            <path d="M0.964 0H121.507V32H0.964z" transform="translate(-9 -8)"></path>
                            <path fill="#000" fill-rule="nonzero" d="M15.937 19.184c.155.363.104.829.026 1.114-.13.492-.466 1.01-1.45 1.01-.931 0-1.5-.544-1.5-1.347v-1.45H9v1.14C9 22.99 11.614 24 14.436 24c2.692 0 4.918-.932 5.28-3.417.181-1.295.052-2.123-.026-2.46-.62-3.133-6.29-4.065-6.73-5.8-.077-.31-.051-.62-.026-.776.104-.466.44-1.01 1.372-1.01.88 0 1.398.544 1.398 1.346v.933h3.728v-1.062C19.432 8.492 16.507 8 14.384 8c-2.666 0-4.815.88-5.229 3.314-.103.673-.13 1.269.026 2.02.673 3.028 5.98 3.909 6.756 5.85zm48.534-.025c.155.362.103.828.026 1.087-.13.492-.466.984-1.45.984-.932 0-1.475-.544-1.475-1.347V18.46h-3.96v1.139c0 3.288 2.588 4.297 5.383 4.297 2.667 0 4.867-.906 5.23-3.391.18-1.269.05-2.123-.027-2.434-.621-3.107-6.238-4.013-6.652-5.747-.078-.311-.052-.622-.026-.777.104-.466.414-.984 1.346-.984.854 0 1.372.544 1.372 1.346v.907h3.701V11.78c0-3.21-2.899-3.728-4.995-3.728-2.615 0-4.763.88-5.177 3.288-.104.647-.13 1.243.026 1.993.673 3.03 5.927 3.91 6.678 5.826zm30.984 1.32l-.207-12.013h3.701v14.757h-5.332l-3.753-12.401.207 12.401h-3.676V8.466h5.54l3.52 12.013zM28.335 9.553l-2.07 13.826h-4.038l2.744-14.913h6.652l2.744 14.913h-4.012l-2.02-13.826zm21.796 0L47.542 23.38h-3.779L41.201 9.553l-.104 13.826H37.37l.31-14.913h6.083l1.89 11.65 1.89-11.65h6.082l.337 14.913h-3.728l-.103-13.826zm26.868 11.6c1.035 0 1.372-.726 1.424-1.088.026-.156.026-.389.026-.57V8.44h3.779V19.16c0 .284-.026.828-.026.983-.259 2.797-2.46 3.703-5.203 3.703-2.744 0-4.944-.906-5.203-3.703-.026-.155-.052-.699-.026-.983V8.44h3.78v11.055c0 .181 0 .414.025.57.078.388.389 1.087 1.424 1.087zm31.165-.156c1.087 0 1.45-.7 1.527-1.088.026-.18.052-.388.026-.57v-2.174h-1.527V14.99h5.28v4.013c0 .285 0 .492-.051.984-.259 2.719-2.615 3.676-5.255 3.676-2.64 0-4.996-.957-5.254-3.676-.052-.492-.052-.699-.052-.984v-6.291c0-.259.026-.725.052-.984.336-2.796 2.588-3.676 5.254-3.676 2.64 0 4.97.88 5.229 3.676.052.466.026.984.026.984v.492h-3.78v-.829s0-.362-.051-.57c-.078-.336-.362-1.087-1.501-1.087-1.088 0-1.398.725-1.476 1.088-.052.207-.052.466-.052.699v6.835c0 .181 0 .388.026.57.104.414.492 1.087 1.58 1.087z" transform="translate(-9 -8)"></path>
                          </g>
                      </svg>
                    </div> Sistem Klimaları Merkez Servisi
      
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>
  </div>
</footer>
<!-- End Footer -->




  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Topbar ve navbar'ı kontrol et
    document.addEventListener("DOMContentLoaded", function () {
      const topbar = document.getElementById("topbar");
      const navbar = document.querySelector(".navbar");
      let lastScrollTop = 0;

      window.addEventListener("scroll", function () {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
          // Aşağı kaydırılıyor: Topbar ve navbar kaybolur
          topbar.style.top = "-40px";
          navbar.style.top = "0"; // Navbar en üste yerleşir
        } else {
          // Yukarı kaydırılıyor: Topbar geri gelir ve navbar topbar'ın altına yerleşir
          topbar.style.top = "0";
          navbar.style.top = "40px"; // Navbar tekrar topbar'ın altına yerleşir
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Negatif kaydırmayı sıfırla
      });
    });
  </script>

   <!-- Vendor JS Files -->
   <script src="vendor/purecounter/purecounter.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="vendor/glightbox/js/glightbox.min.js"></script>
   <script src="vendor/swiper/swiper-bundle.min.js"></script>
   <script src="vendor/php-email-form/validate.js"></script>
   
    <!-- Template Main JS File -->
  <script src="js/main.js"></script>


</body>

</html>