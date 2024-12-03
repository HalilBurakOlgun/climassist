<?php
require_once "db.php"; // Veritabanı bağlantısını dahil et

// Formdan gelen verileri al
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

// Kullanıcıyı veritabanına ekle
$sql = "INSERT INTO users (Name, SurName, Email, Phone, Password, UserType, CreatedAt)
        VALUES (?, ?, ?, ?, ?, 'customer', NOW())";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssss", $name, $surname, $email, $phone, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Kayıt başarılı! Giriş yapabilirsiniz.'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Kayıt sırasında bir hata oluştu! Lütfen tekrar deneyin.'); window.location.href = 'register.php';</script>";
    }

    $stmt->close();
} else {
    echo "Hata: " . $conn->error;
}

$conn->close();
?>