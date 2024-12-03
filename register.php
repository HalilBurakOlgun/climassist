<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
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
            font-family: "Open Sans", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(img/2.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }

        .wrapper {
            width: 750px;
            border-radius: 10px;
            color: black;
            padding: 40px 35px 55px;
            border: 2px solid rgba(255, 255, 255, .2);
            background: rgba(173, 160, 160, 0.1);
            backdrop-filter: blur(50px);
        }

        @media (max-width: 576px) {
            .input-box .input-field {
                width: 100%;
                margin: 10px 0;
            }
        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 0px;
        }

        .wrapper .input-box {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .input-box .input-field {
            position: relative;
            width: 48%;
            height: 50px;
            margin: 15px 0;
        }

        .input-box .input-field input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: 2px solid black;
            outline: none;
            font-size: 16px;
            color: black;
            border-radius: 40px;
            padding: 15px 15px 15px 40px;
        }

        .input-box .input-field input::placeholder {
            color: black;
        }

        .input-box .input-field i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 15px;
        }

        .wrapper label {
            font-size: 14.5px;
            display: inline-block;
            margin: 10px 0 23px;
        }

        .wrapper label input {
            accent-color: grey;
            margin-right: 10px;
        }

        .wrapper .btn-primary {
            width: 100%;
            height: 45px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            border: none;
            outline: none;
            font-weight: 600;
            color: #fff;
            font-size: 16px;
        }

        .register-link p a {
            color: navy;
            text-decoration: none;
            font-weight: 600;
            margin: 5px;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }

        .wrapper .register-link {
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }

        .error-message {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            color: #101460;
            padding: 20px 30px;
            border-radius: 8px;
            font-size: 16px;
            text-align: center;
            z-index: 9999;
            display: none;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
        }

        .main-menu i {
            color: #101460;
        }
    </style>

</head>
<body>

    <div class="wrapper">

        <div class="main-menu">
            <a href="index.php">
                <i class="bi bi-x-circle"></i>
            </a>
        </div>

        <h1><b>Kayıt Ol</b></h1>

        <form action="register_process.php" method="post">
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="name" placeholder="Ad" required>
                    <i class="bi bi-person"></i>
                </div>
                <div class="input-field">
                    <input type="text" name="surname" placeholder="Soyad" required>
                    <i class="bi bi-person-fill"></i>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="input-field">
                    <input type="tel" name="phone" placeholder="Telefon Numarası (05XX1112233)" required>
                    <i class="bi bi-telephone-fill"></i>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="password" name="password" placeholder="Şifreniz" required>
                    <i class="bi bi-shield-lock"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="confirm_password" placeholder="Şifrenizi Doğrulayın" required>
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
            </div>

            <label>
                <input type="checkbox" required> Bilgilerimin doğruluğunu kabul ediyorum
            </label>
            <button type="submit" class="btn-primary">Kayıt Ol</button>

            <div class="register-link">
                <p>Zaten hesabınız var mı? <a href="login.php">Giriş Yap</a></p>
            </div>
        </form>

    </div>

    <!-- Hata mesajı -->
    <div class="error-message" id="errorMessage">Şifreler uyuşmuyor!</div>

    <script>
        document.querySelector("form").addEventListener("submit", function (e) {
            const password = document.querySelector("input[name='password']").value;
            const confirmPassword = document.querySelector("input[name='confirm_password']").value;

            if (password !== confirmPassword) {
                e.preventDefault();
                const errorMessage = document.getElementById("errorMessage");
                errorMessage.style.display = "block";

                // Hata mesajını 3 saniye sonra gizle
                setTimeout(() => {
                    errorMessage.style.display = "none";
                }, 3000);
            }
        });
    </script>

</body>


</html>