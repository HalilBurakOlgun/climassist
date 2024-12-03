<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Formdan gelen verileri al
    $userId = $_SESSION['id'] ?? null; // Giriş yapan kullanıcı varsa
    $username = $_POST['username'];
    $usersurname = $_POST['usersurname'];
    $email = $_POST['email'];
    $clientType = $_POST['clienttype'];
    $phone = $_POST['phone'];
    $requestType = $_POST['requesttype'];
    $sparePartType = $_POST['spareparttype'] ?? null;
    $recoveryTime = $_POST['recoverytime'] ?? null;
    $unitType = $_POST['unit'] ?? null;
    $message = $_POST['message'] ?? null;

    // 8 haneli rastgele takip kodu oluştur
    $trackingCode = strtoupper(bin2hex(random_bytes(4)));

    // SQL sorgusu
    $sql = "INSERT INTO requests (UserId, UserName, UserSurname, Email, ClientType, Phone, RequestType, SparePartType, RecoveryTime, UnitType, Message, Status, TrackingCode, CreatedAt) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', ?, NOW())";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("isssssssssss", $userId, $username, $usersurname, $email, $clientType, $phone, $requestType, $sparePartType, $recoveryTime, $unitType, $message, $trackingCode);

    if ($stmt->execute()) {
        // Başarıyla kayıt olunca yönlendirme yap
        header("Location: track_code.php?code=$trackingCode");
        exit();
    } else {
        echo "Hata: " . $stmt->error;
    }
}
?>
