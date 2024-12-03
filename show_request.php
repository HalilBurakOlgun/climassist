<?php
session_start();
include('db.php'); // Veritabanı bağlantısı

// Giriş yapmış kullanıcının verilerini al
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Giriş yapılmamışsa login sayfasına yönlendir
    exit;
}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type']; // Giriş yapan kullanıcının türü (customer, staff, admin)

// Veritabanından kullanıcının taleplerini al
$sql = "SELECT * FROM requests WHERE user_id = :user_id"; // customer için kendi talepleri
if ($user_type == 'staff' || $user_type == 'admin') {
    $sql = "SELECT * FROM requests"; // staff ve admin için tüm talepler
}

$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$requests = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taleplerim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Taleplerim</h1>

        <?php if ($user_type == 'staff' || $user_type == 'admin') : ?>
            <div class="alert alert-info" role="alert">
                <strong>Yönetici veya personelsiniz. Tüm taleplerin durumlarını güncelleyebilirsiniz.</strong>
            </div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kullanıcı Adı</th>
                    <th>Talep Türü</th>
                    <th>Durum</th>
                    <?php if ($user_type == 'staff' || $user_type == 'admin') : ?>
                        <th>Durum Güncelle</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request) : ?>
                    <tr>
                        <td><?= $request['id'] ?></td>
                        <td><?= htmlspecialchars($request['user_name']) ?></td>
                        <td><?= htmlspecialchars($request['request_type']) ?></td>
                        <td><?= htmlspecialchars($request['status']) ?></td>
                        <?php if ($user_type == 'staff' || $user_type == 'admin') : ?>
                            <td>
                                <a href="update_status.php?id=<?= $request['id'] ?>&status=pending" class="btn btn-warning">Beklemede</a>
                                <a href="update_status.php?id=<?= $request['id'] ?>&status=in_progress" class="btn btn-info">Devam Ediyor</a>
                                <a href="update_status.php?id=<?= $request['id'] ?>&status=completed" class="btn btn-success">Tamamlandı</a>
                                <a href="update_status.php?id=<?= $request['id'] ?>&status=rejected" class="btn btn-danger">Reddedildi</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
