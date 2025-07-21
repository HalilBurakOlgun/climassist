<?php
session_start();
require 'db.php';

// Kullanıcı oturum kontrolü
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifre Yenile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <style>
        /* Navbar stil ayarları */
        .navbar {
            background-color: #fff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 40px; /* Topbar'ın hemen altına hizala */
            left: 0;
            right: 0;
            z-index: 998;
            transition: top 0.5s ease-in-out; /* Yavaş geçiş efekti */
        }

        /* Navbar menü linkleri */
        .navbar-nav .nav-link {
            color: #2c4964;
            font-size: 14px;
            padding: 10px 15px;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #101460; /* Hover ve aktif linkler için lacivert renk */
        }

        /* Navbar mobil menü butonu */
        .navbar-toggler {
            border: none;
        }

        .dropdown-menu .dropdown-submenu:hover > .dropdown-menu {
            display: block; /* Alt menü hover ile görünür */
        }

        /* Buton stil ayarları (Giriş Yap, Kayıt Ol, vb.) */
        .btn-primary {
            background-color: #101460; /* Lacivert arka plan */
            border-color: #101460; /* Lacivert border */
            color: white; /* Beyaz yazı */
            border-radius: 80px; /* Oval şekil */
            padding: 10px 20px; /* Butonun içi */
            font-size: 14px; /* Buton yazı boyutu */
            text-decoration: none; /* Alt çizgi yok */
        }

        .btn-primary:hover {
            background-color: #166ab5; /* Hover durumunda açık lacivert */
            border-color: #166ab5; /* Hover border rengi */
        }

        /* Şifre yenileme formunu ortalamak için stil */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Sayfa yüksekliği kadar */
        }

        .card {
            width: 100%;
            max-width: 400px; /* Maksimum genişlik */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/climassist_logo.png" alt="Logo" style="height: 35px;">
            </a>
        </div>
    </nav>

    <!-- Şifre Yenileme Formu -->
    <div class="form-container">
        <div class="card shadow-sm">
            <div class="card-header text-center bg-primary text-white">
                <h4>Şifre Yenile</h4>
            </div>
            <div class="card-body">
                <p class="text-muted text-center">Yeni şifrenizi belirleyin.</p>
                <form action="reset_password_process.php" method="POST">
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Yeni Şifre</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Yeni şifrenizi girin" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Şifreyi Onaylayın</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Şifreyi tekrar girin" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Şifreyi Güncelle</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
