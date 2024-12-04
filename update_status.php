<?php
session_start();
require_once 'db.php'; // Veritabanı bağlantısı

// Kullanıcı giriş yapmamışsa login.php'ye yönlendir
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];

// Sadece Admin ve Staff kullanıcıları durumu değiştirebilir
if ($userType != 'Admin' && $userType != 'Staff') {
    header("Location: show_request.php"); // Yetkisiz erişim, talepleri görüntüleme sayfasına yönlendir
    exit();
}

// Durum güncelleme işlemi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requestId = $_POST['request_id'];
    $status = $_POST['status'];

    $sql = "UPDATE requests SET Status = ? WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $requestId);

    if ($stmt->execute()) {
        header("Location: show_request.php");
        exit();
    } else {
        echo "Durum güncellenirken bir hata oluştu.";
    }
}
?>
