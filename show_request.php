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

// Kullanıcının taleplerini getir (en son gerçekleşen talep en üstte)
$sql = "SELECT * FROM requests 
        WHERE UserId = ? OR 'Staff' = ? OR 'Admin' = ? 
        ORDER BY CreatedAt DESC"; // CreatedAt'e göre ters sıralama
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $userId, $userType, $userType);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taleplerim</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Genel ayarlar */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .navbar {
            border-bottom: 1px solid #ddd;
        }
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
        /* Buton ayarları */
        .btn-primary {
            background-color: #0056b3;
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            font-size: 14px;
        }
        .btn-primary:hover {
            background-color: #003d80;
            color: #fff;
        }
        .status-select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        @media (max-width: 768px) {
            .card {
                margin-bottom: 20px;
            }
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
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Talep ID: <?php echo htmlspecialchars($row['Id']); ?></h5>
                                <p class="card-text"><strong>Talep Türü:</strong> <?php echo htmlspecialchars($row['RequestType']); ?></p>
                                <p class="card-text"><strong>Durum:</strong> <?php echo htmlspecialchars($row['Status']); ?></p>
                                <p class="card-text"><strong>Oluşturulma Tarihi:</strong> <?php echo htmlspecialchars($row['CreatedAt']); ?></p>
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
            <?php else: ?>
                <p>Henüz bir talep oluşturmadınız.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
