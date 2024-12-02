<?php
require_once "db.php"; // Veritabanı bağlantısı

// Formdan gelen verileri al
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);

// Şifre eşleşmesini kontrol et
if ($password !== $confirm_password) {
    echo "<script>alert('Şifreler uyuşmuyor!'); window.location.href = 'register.html';</script>";
    exit;
}

// Şifreyi hashle
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Kullanıcıyı veritabanına ekle
$sql = "INSERT INTO users (first_name, last_name, email, phone, password, created_at)
        VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>alert('Kayıt başarılı! Giriş yapabilirsiniz.'); window.location.href = 'login.html';</script>";
    } else {
        echo "<script>alert('Kayıt sırasında bir hata oluştu! Lütfen tekrar deneyin.'); window.location.href = 'register.html';</script>";
    }

    $stmt->close();
} else {
    echo "Hata: " . $conn->error;
}

$conn->close();
?>
