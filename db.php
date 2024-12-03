<?php
$servername = "localhost"; // MySQL sunucu adı
$username = "root";         // phpMyAdmin kullanıcı adı
$password = "";             // phpMyAdmin şifresi (boşsa boş bırakın)
$dbname = "climassistdb";  // Veritabanı adı

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantısı başarısız: " . $e->getMessage());
}
?>