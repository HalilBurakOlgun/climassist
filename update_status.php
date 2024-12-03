<?php
session_start();
include('db_connection.php'); // Veritabanı bağlantısı

// Giriş yapılmamışsa login sayfasına yönlendir
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Kullanıcı yetkisi kontrolü (admin veya staff olması gerekir)
$user_type = $_SESSION['user_type'];
if ($user_type != 'admin' && $user_type != 'staff') {
    header('Location: show_request.php'); // Yetkisiz kullanıcıyı kendi taleplerine yönlendir
    exit;
}

// Taleple ilgili işlemi yapalım
if (isset($_GET['id']) && isset($_GET['status'])) {
    $request_id = $_GET['id'];
    $status = $_GET['status'];

    // Geçerli bir durum var mı kontrol et
    $valid_statuses = ['pending', 'in_progress', 'completed', 'rejected'];
    if (in_array($status, $valid_statuses)) {
        // Durumu güncelle
        $sql = "UPDATE requests SET status = :status WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['status' => $status, 'id' => $request_id]);

        // Başarı mesajı
        header('Location: show_request.php');
        exit;
    } else {
        // Geçersiz durum
        echo "Geçersiz bir durum seçtiniz.";
    }
} else {
    // Parametreler eksikse hata mesajı
    echo "Geçersiz işlem.";
}
