<?php
// db.php dosyasını dahil et
include 'db.php'; // Veritabanı bağlantısı

// Oturum başlat
session_start();

// Formdan gelen verileri al
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// E-posta ve şifreyi veritabanında kontrol et
$sql = "SELECT * FROM users WHERE Email = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Eğer kullanıcı varsa, şifreyi kontrol et
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Şifreyi doğrula (hashleme kullanılmıyorsa doğrudan karşılaştırma yapılır)
        if ($password === $user['Password']) {
    // Kullanıcı oturumu başlat
    session_start();
    $_SESSION['user_id'] = $user['Id']; 
    $_SESSION['user_name'] = $user['Name']; // Adı sakla
    $_SESSION['user_surname'] = $user['SurName']; // Soyadı sakla
    $_SESSION['user_type'] = $user['UserType'];

    echo "<script>alert('Giriş başarılı!'); window.location.href = 'index.php';</script>";
}
 else {
            // Şifre yanlış
            echo "<script>alert('Şifre yanlış!'); window.location.href = 'login.php';</script>";
        }
    } else {
        // Kullanıcı bulunamadı
        echo "<script>alert('Kullanıcı bulunamadı!'); window.location.href = 'login.php';</script>";
    }

    $stmt->close();
} else {
    echo "Hata: " . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();
?>