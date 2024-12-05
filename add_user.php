<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
    header("Location: index.php");
    exit();
}
require_once 'db.php'; // Veritabanı bağlantısı

// Kullanıcı ekleme işlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $userType = $_POST['user_type'] ?? 'Customer';

    $stmt = $conn->prepare("INSERT INTO users (Name, SurName, Email, Password, Phone, UserType) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $surname, $email, $password, $phone, $userType);

    if ($stmt->execute()) {
        $message = "Kullanıcı başarıyla eklendi.";
    } else {
        $message = "Hata: Kullanıcı eklenemedi. " . $conn->error;
    }
    $stmt->close();
}

// Kullanıcı silme işlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $userId = $_POST['user_id'] ?? 0;

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        $message = "Kullanıcı başarıyla silindi.";
    } else {
        $message = "Hata: Kullanıcı silinemedi. " . $conn->error;
    }
    $stmt->close();
}

// Kullanıcıları çekme fonksiyonu
function fetchUsers($conn, $roleFilter = '')
{
    $sql = "SELECT id, Name, SurName, Email, Phone, UserType FROM users";
    if ($roleFilter) {
        $sql .= " WHERE UserType = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $roleFilter);
        $stmt->execute();
        $result = $stmt->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    } else {
        $result = $conn->query($sql);
        $users = $result->fetch_all(MYSQLI_ASSOC);
        $result->close();
    }
    return $users;
}

// Filtreleme işlemi için gelen role değerini al
$roleFilter = isset($_GET['role_filter']) ? $_GET['role_filter'] : '';
$users = fetchUsers($conn, $roleFilter);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Yönetimi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        body {
            margin-top: 80px; /* Navbar için boşluk bırak */
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 998;
        }

        .navbar-nav .nav-link {
            color: #2c4964;
            font-size: 14px;
            padding: 10px 15px;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #101460;
        }

        .btn-primary {
            background-color: #101460;
            border-color: #101460;
            color: white;
            border-radius: 80px;
            padding: 10px 20px;
            font-size: 14px;
        }

        .btn-primary:hover {
            background-color: #166ab5;
            border-color: #166ab5;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/climassist_logo.png" alt="Logo" style="height: 35px;">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="logout.php" class="btn btn-primary ms-3">Çıkış Yap</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Kullanıcı Yönetimi -->
    <div class="container mt-5">
        <ul class="nav nav-tabs" id="userManagementTabs" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="add-user-tab" data-bs-toggle="tab" data-bs-target="#add-user" type="button" role="tab">Kullanıcı Ekle</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="view-users-tab" data-bs-toggle="tab" data-bs-target="#view-users" type="button" role="tab">Kullanıcıları Görüntüle</button>
            </li>
        </ul>
        <div class="tab-content mt-3">
            <!-- Kullanıcı Ekle -->
            <div class="tab-pane fade show active" id="add-user" role="tabpanel">
                <?php if (isset($message)): ?>
                    <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
                <?php endif; ?>
                <form method="POST">
                    <input type="hidden" name="add_user">
                    <div class="mb-3">
                        <label for="name" class="form-label">Ad</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Soyad</label>
                        <input type="text" class="form-control" id="surname" name="surname" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-posta</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Şifre</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefon</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_type" class="form-label">Rol</label>
                        <select class="form-select" id="user_type" name="user_type" required>
                            <option value="Customer">Customer</option>
                            <option value="Staff">Staff</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Kullanıcı Ekle</button>
                </form>
            </div>

            <!-- Kullanıcıları Görüntüle -->
            <div class="tab-pane fade" id="view-users" role="tabpanel">
                <div>
                    <label for="role_filter" class="form-label">Filtrele:</label>
                    <form method="GET" action="">
                        <select id="role_filter" class="form-select" name="role_filter" onchange="this.form.submit()">
                            <option value="">Tüm Roller</option>
                            <option value="Customer" <?php echo $roleFilter == 'Customer' ? 'selected' : ''; ?>>Customer</option>
                            <option value="Staff" <?php echo $roleFilter == 'Staff' ? 'selected' : ''; ?>>Staff</option>
                            <option value="Admin" <?php echo $roleFilter == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </form>
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ad</th>
                            <th>Soyad</th>
                            <th>Email</th>
                            <th>Telefon</th>
                            <th>Rol</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                                <td><?php echo htmlspecialchars($user['Name']); ?></td>
                                <td><?php echo htmlspecialchars($user['SurName']); ?></td>
                                <td><?php echo htmlspecialchars($user['Email']); ?></td>
                                <td><?php echo htmlspecialchars($user['Phone']); ?></td>
                                <td><?php echo htmlspecialchars($user['UserType']); ?></td>
                                <td>
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                        <button type="submit" name="delete_user" class="btn btn-danger btn-sm">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
