<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kod Takip</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Özel CSS -->
    <link href="style.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(img/1.jpg) no-repeat;
            background-position: center;
            background-size: cover;
        }

        .wrapper {
            width: 420px;
            background: transparent;
            color: black;
            border-radius: 10px;
            padding: 30px 40px;
            border: 2px solid rgba(255, 255, 255, .2);
            background: rgba(173, 160, 160, 0.1);
            backdrop-filter: blur(50px);
        }

        .wrapper h1 {
            font-size: 40px;
            text-align: center;
            font-family: "Open Sans", sans-serif;
            color: #101460;
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: black;
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder {
            color: black;
        }

        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .wrapper .btn-primary {
            width: 100%;
            height: 45px;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1.0);
            color: #fff;
            font-weight: 600;
        }

        .wrapper .register-link {
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }

        .register-link p a {
            color: #101460;
            text-decoration: none;
            font-weight: 600;
            font-size: 17px;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }
        .main-menu i{
            color: #101460;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>    
    <div class="wrapper">
        <form id="trackForm" onsubmit="return validateCode()">
            <div class="main-menu">
                <a href="index.html">
                    <i class="bi bi-x-circle"></i>
                </a>
            </div>
            <h1><b>Kod Takip</b></h1>
            <div class="input-box">
                <input id="trackingCode" type="text" placeholder="Takip Kodunuzu Girin" required>
                <i class="bi bi-upc-scan"></i>
            </div>
            <button type="submit" class="btn-primary">Takip Et</button>

            <div class="register-link">
                <p>Yeni bir talep oluşturmak için <a href="request_form.html">buraya tıklayın</a>.</p>
            </div>
        </form>
    </div>

    <!-- Vendor JS Files -->
    <script src="vendor/purecounter/purecounter.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>

    <!-- JavaScript -->
    <script>
        function validateCode() {
            const code = document.getElementById("trackingCode").value;
            
            // Kodun uzunluğunu burada kontrol etmiyoruz, doğrudan göndereceğiz
            fetch("check_tracking_code.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `trackingCode=${encodeURIComponent(code)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert("Başarılı: " + data.message);
                    window.location.href = `track_code.php?trackingCode=${encodeURIComponent(code)}`;
                } else {
                    alert("Hata: " + data.message);
                }
            })
            .catch(error => {
                console.error("Bir hata oluştu:", error);
                alert("Sunucuyla iletişim sırasında bir hata oluştu. Lütfen tekrar deneyiniz.");
            });

            return false;
        }
    </script>
</body>

</html>
