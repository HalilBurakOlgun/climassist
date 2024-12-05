<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talep Başarıyla Gönderildi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        .container h1 {
            color: #4CAF50;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .container p {
            font-size: 1.1em;
            margin: 10px 0;
        }

        .tracking-code {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
            background: #e8f5e9;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            margin: 20px 0;
        }

        .btn {
            text-decoration: none;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Talebiniz Başarıyla Gönderildi!</h1>
        <p>Aşağıdaki takip koduyla talebinizi takip edebilirsiniz:</p>
        <div class="tracking-code">
            <?php
            // URL parametresinden takip kodunu al
            if (isset($_GET['trackingCode'])) {
                echo htmlspecialchars($_GET['trackingCode']);
            } else {
                echo "Geçersiz takip kodu!";
            }
            ?>
        </div>
        <a href="index.php" class="btn">Ana Sayfaya Dön</a>
    </div>
</body>

</html>
