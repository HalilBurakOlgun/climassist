<?php
// check_tracking_code.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trackingCode = $_POST['trackingCode'];

    // Takip kodunu kontrol et
    if (empty($trackingCode)) {
        echo json_encode(["status" => "error", "message" => "Takip kodu boş olamaz."]);
        exit;
    }

    // Burada takibi sorgulamak için veri tabanına erişim kodu eklenebilir
    // Örneğin:
    // $result = query("SELECT * FROM tracking WHERE code = '$trackingCode'");

    // Şu anlık başarılı kabul edelim:
    echo json_encode(["status" => "success", "message" => "Takip kodu geçerli."]);
}
?>
