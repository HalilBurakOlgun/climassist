<?php
include 'db.php';
session_start();

// Giriş yapıp yapmadığını kontrol et
$userId = $_SESSION['user_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $usersurname = $_POST['usersurname'];
    $email = $_POST['email'];
    $clientType = $_POST['clienttype'];
    $phone = $_POST['phone'];
    $requestType = $_POST['requesttype'];
    $sparePartType = $_POST['spareparttype'] ?? null;
    $recoveryTime = $_POST['recoverytime'] ?? null;
    $unitType = $_POST['unittype'] ?? null;
    $message = $_POST['message'];
    $status = 'Pending'; // Varsayılan durum
    $trackingCode = uniqid(); // Benzersiz takip kodu oluştur

    if ($userId) {
        // Kullanıcı giriş yaptıysa, talepleri veritabanına ekle
        $sql = "INSERT INTO requests (UserId, UserName, UserSurName, Email, ClientType, Phone, RequestType, SparePartType, RecoveryTime, UnitType, Message, Status, TrackingCode, CreatedAt)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->execute([$userId, $username, $usersurname, $email, $clientType, $phone, $requestType, $sparePartType, $recoveryTime, $unitType, $message, $status, $trackingCode]);
            echo "<script>alert('Talep başarıyla gönderildi! Takip kodunuz: $trackingCode'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Talep gönderme sırasında bir hata oluştu! Lütfen tekrar deneyin.'); window.location.href = 'submit_request.php';</script>";
        }
    } else {
        // Kullanıcı giriş yapmadıysa, UserId'yi NULL olarak veritabanına ekle
        $sql = "INSERT INTO requests (UserId, UserName, UserSurName, Email, ClientType, Phone, RequestType, SparePartType, RecoveryTime, UnitType, Message, Status, TrackingCode, CreatedAt)
                VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->execute([$username, $usersurname, $email, $clientType, $phone, $requestType, $sparePartType, $recoveryTime, $unitType, $message, $status, $trackingCode]);
            echo "<script>
                    alert('Talep başarıyla gönderildi! Takip kodunuz: $trackingCode');
                    window.location.href = 'request_success.php?trackingCode=$trackingCode';
                  </script>";
        } else {
            echo "<script>alert('Talep gönderme sırasında bir hata oluştu! Lütfen tekrar deneyin.'); window.location.href = 'submit_request.php';</script>";
        }
    }
}
?>
