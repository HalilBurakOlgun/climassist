<?php
session_start();
require 'db.php';

// Kullanıcı oturum kontrolü
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form verilerini al
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Şifrelerin eşleşip eşleşmediğini kontrol et
    if ($new_password !== $confirm_password) {
        $_SESSION['error_message'] = "Şifreler eşleşmiyor.";
        header("Location: reset_password.php");
        exit();
    }

    // Kullanıcının şifresini güncelle
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $new_password, $user_id); // Şifreyi hash'lemeden doğrudan veritabanına kaydediyoruz

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Şifreniz başarıyla güncellendi!";
        header("Location: index.php"); // Şifrenin güncellenmesinin ardından yönlendirme
        exit();
    } else {
        $_SESSION['error_message'] = "Bir hata oluştu, lütfen tekrar deneyin.";
        header("Location: reset_password.php");
        exit();
    }
}
?>
