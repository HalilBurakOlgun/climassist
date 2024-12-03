<?php
include 'db.php'; // Veritabanı bağlantısı

session_start();

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$sql = "SELECT * FROM users WHERE Email = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['Password'])) {
    $_SESSION['user_id'] = $user['id']; 
    $_SESSION['user_name'] = $user['Name'];
    $_SESSION['user_surname'] = $user['SurName'];
    $_SESSION['user_type'] = $user['User Type'];
    echo "<script>alert('Giriş başarılı!'); window.location.href = 'index.php';</script>";
} else {
    echo "<script>alert('Kullanıcı adı veya şifre yanlış!'); window.location.href = 'login.php';</script>";
}
?>