<?php
require_once "db.php"; // Veritabanı bağlantısını dahil et

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);

// Şifre eşleşmesini kontrol et
if ($password !== $confirm_password) {
    echo "<script>alert('Şifreler uyuşmuyor!'); window.location.href = 'register.php';</script>";
    exit;
}

// Şifreyi hashle
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Kullanıcıyı veritabanına ekle
$sql = "INSERT INTO users (Name, SurName, Password, Email, UserType, Phone, CreatedAt)
        VALUES (?, ?, ?, ?, 'Customer', ?, NOW())";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->execute([$name, $surname, $hashed_password, $email, $phone]);
    echo "<script>alert('Kayıt başarılı! Giriş yapabilirsiniz.'); window.location.href = 'login.php';</script>";
} else {
    echo "<script>alert('Kayıt sırasında bir hata oluştu! Lütfen tekrar deneyin.'); window.location.href = 'register.php';</script>";
}
?>