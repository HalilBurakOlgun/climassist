<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id'] ?? null; // Giriş yapan kullanıcı varsa
    $username = $_POST['username'];
    $usersurname = $_POST['usersurname'];
    $email = $_POST['email'];
    $clientType = $_POST['clienttype'];
    $phone = $_POST['phone'];
    $requestType = $_POST['requesttype'];
    $sparePartType = $_POST['spareparttype'] ?? null;
    $recoveryTime = $_POST['recoverytime'] ?? null;
    $unitType= $_POST['unittype'] ?? null;
    $message = $_POST['message'];
    $status = 'Pending'; // Varsayılan durum
    $trackingCode = uniqid(); // Benzersiz takip kodu oluştur

    // Talebi veritabanına ekle
    $sql = "INSERT INTO requests (UserId, UserName, UserSurName, Email, ClientType, Phone, RequestType, SparePartType, RecoveryTime, UnitType, Message, Status, TrackingCode, CreatedAt)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->execute([$userId, $username, $usersurname, $email, $clientType, $phone, $requestType, $sparePartType, $recoveryTime, $unitType, $message, $status, $trackingCode]);
        echo "<script>alert('Talep başarıyla gönderildi! Takip kodunuz: $trackingCode'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Talep gönderme sırasında bir hata oluştu! Lütfen tekrar deneyin.'); window.location.href = 'submit_request.php';</script>";
    }
}
?>