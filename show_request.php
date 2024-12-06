<?php
session_start(); // Oturum başlat

// Kullanıcı giriş yapmamışsa login.php'ye yönlendir
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'db.php'; // Veritabanı bağlantısı

$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type']; // Admin, Staff ya da Customer olarak ayarladık

// Talepleri almak için SQL sorgusu
$statusOptions = ['pending' => 'Beklemede', 'in_progress' => 'Devam Ediyor', 'completed' => 'Tamamlandı', 'rejected' => 'Reddedildi'];
$requests = [];

foreach ($statusOptions as $status => $statusName) {
    $sql = "SELECT * FROM requests WHERE (UserId = ? OR ? = 'Staff' OR ? = 'Admin') AND Status = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $userId, $userType, $userType, $status);
    $stmt->execute();
    $requests[$status] = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taleplerim</title>
    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Genel ayarlar */
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .navbar {
        background-color: #fff;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 40px; /* Topbar'ın hemen altına hizala */
        left: 0;
        right: 0;
        z-index: 998;
        transition: top 0.5s ease-in-out; /* Yavaş geçiş efekti */
        border-bottom: 1px solid #ddd;
    }

    /* Navbar menü linkleri */
    .navbar-nav .nav-link {
        color: #2c4964;
        font-size: 14px;
        padding: 10px 15px;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #101460; /* Hover ve aktif linkler için lacivert renk */
    }

    /* Navbar mobil menü butonu */
    .navbar-toggler {
        border: none;
    }

    /* Dropdown alt menü stil */
    .dropdown-menu .dropdown-submenu:hover > .dropdown-menu {
        display: block; /* Alt menü hover ile görünür */
    }

    /* Buton stil ayarları (Giriş Yap, Kayıt Ol, vb.) */
    .btn-primary {
        background-color: #101460; /* Lacivert arka plan */
        border-color: #101460; /* Lacivert border */
        color: white; /* Beyaz yazı */
        border-radius: 80px; /* Oval şekil */
        padding: 10px 20px; /* Butonun içi */
        font-size: 14px; /* Buton yazı boyutu */
        text-decoration: none; /* Alt çizgi yok */
    }

    .btn-primary:hover {
        background-color: #166ab5; /* Hover durumunda açık lacivert */
        border-color: #166ab5; /* Hover border rengi */
    }

    /* Durum değiştirme formu */
    .status-select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Sekme stili */
    .nav-link {
        border-radius: 0;
    }

    /* Card stil ayarları */
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15);
    }

    .card-title {
        color: #0056b3;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 14px;
        margin-bottom: 8px;
    }

    .container h2 {
        color: #333;
        text-align: center;
        font-weight: bold;
        margin-bottom: 30px;
    }

    p {
        margin: 0;
    }

    /* Responsive düzen */
    @media (max-width: 768px) {
        .card {
            margin-bottom: 20px;
        }
    }

    /* Şifre yenileme formunu ortalamak için stil */
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Sayfa yüksekliği kadar */
    }

    .card {
        width: 100%;
        max-width: 400px; /* Maksimum genişlik */
    }
</style>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/climassist_logo.png" alt="Logo" style="height: 35px;">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="btn btn-primary ms-3" style="pointer-events: none;">
                            Merhaba, <?php echo htmlspecialchars($_SESSION['user_name']) . " " . htmlspecialchars($_SESSION['user_surname']); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-primary ms-3">Çıkış Yap</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Taleplerim</h2>

        <!-- Sekmeler -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php foreach ($statusOptions as $status => $statusName): ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php echo $status == 'pending' ? 'active' : ''; ?>" id="<?php echo $status; ?>-tab" data-bs-toggle="tab" href="#<?php echo $status; ?>" role="tab" aria-controls="<?php echo $status; ?>" aria-selected="true"><?php echo $statusName; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="tab-content mt-3" id="myTabContent">
            <?php foreach ($statusOptions as $status => $statusName): ?>
                <div class="tab-pane fade <?php echo $status == 'pending' ? 'show active' : ''; ?>" id="<?php echo $status; ?>" role="tabpanel" aria-labelledby="<?php echo $status; ?>-tab">
                    <?php if ($requests[$status]->num_rows > 0): ?>
                        <div class="row">
                            <?php while ($row = $requests[$status]->fetch_assoc()): ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Talep ID: <?php echo htmlspecialchars($row['Id']); ?></h5>
                                            <p class="card-text"><strong>Talep Türü:</strong> <?php echo htmlspecialchars($row['RequestType']); ?></p>
                                            <p class="card-text"><strong>Yedek Parça:</strong> <?php echo htmlspecialchars($row['SparePartType']); ?></p>
                                            <p class="card-text"><strong>Durum:</strong> <?php echo htmlspecialchars($row['Status']); ?></p>
                                            <p class="card-text"><strong>Oluşturulma Tarihi:</strong> <?php echo htmlspecialchars($row['CreatedAt']); ?></p>
                                            <p class="card-text"><strong>İsim:</strong> <?php echo htmlspecialchars($row['UserName']); ?></p>
                                            <p class="card-text"><strong>Soyisim:</strong> <?php echo htmlspecialchars($row['UserSurname']); ?></p>
                                            <p class="card-text"><strong>Telefon:</strong> <?php echo htmlspecialchars($row['Phone']); ?></p>
                                            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($row['Email']); ?></p>

                                            <?php if ($userType == 'Admin' || $userType == 'Staff'): ?>
                                                <form action="update_status.php" method="POST">
                                                    <input type="hidden" name="request_id" value="<?php echo $row['Id']; ?>">
                                                    <select name="status" class="status-select">
                                                        <option value="pending" <?php echo ($row['Status'] == 'pending') ? 'selected' : ''; ?>>Beklemede</option>
                                                        <option value="in_progress" <?php echo ($row['Status'] == 'in_progress') ? 'selected' : ''; ?>>Devam Ediyor</option>
                                                        <option value="completed" <?php echo ($row['Status'] == 'completed') ? 'selected' : ''; ?>>Tamamlandı</option>
                                                        <option value="rejected" <?php echo ($row['Status'] == 'rejected') ? 'selected' : ''; ?>>Reddedildi</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-primary mt-2">Durumu Güncelle</button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <p>Henüz bir talep bulunmamaktadır.</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
