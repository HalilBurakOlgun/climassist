<?php
// JSON formatında çıktı göndermek için header ekleyelim
header('Content-Type: application/json'); 

// Hata yönetimi
try {
    // Takip kodunu al
    if (isset($_POST['trackingCode'])) {
        $trackingCode = $_POST['trackingCode'];

        // Takip kodu kontrolü (örneğin "12345678" kodunu doğru kabul ediyoruz)
        if ($trackingCode === '12345678') { 
            $response = [
                'status' => 'success',
                'message' => 'Takip kodu başarıyla bulundu.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Geçersiz takip kodu.'
            ];
        }
    } else {
        throw new Exception("Takip kodu gönderilmedi.");
    }

    // JSON formatında cevap dön
    echo json_encode($response); 
} catch (Exception $e) {
    // Hata durumu
    echo json_encode([
        'status' => 'error',
        'message' => 'Bir hata oluştu: ' . $e->getMessage()
    ]);
}
?>