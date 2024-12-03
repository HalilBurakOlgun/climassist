<?php
$servername = "localhost"; // MySQL Sunucu adı (phpMyAdmin genelde localhost'tur)
$username = "root";        // phpMyAdmin kullanıcı adı
$password = "";            // phpMyAdmin şifresi (şifre genelde boş gelir)
$dbname = "climassistdb";  // phpMyAdmin'de oluşturduğun veritabanı adı

// Bağlantıyı oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}
echo "Bağlantı başarılı!";
?>