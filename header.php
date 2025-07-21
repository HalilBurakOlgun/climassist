<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</body>
</html>