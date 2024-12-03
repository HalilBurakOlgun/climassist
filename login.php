<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giriş Yap</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
        
        body{
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 100vh;
          background: url(img/1.jpg) no-repeat;
          background-position: center;
          background-size: cover;
          
        }
        .wrapper{
          width: 420px;
          background: transparent;
          color: black;
          border-radius: 10px;
          padding: 30px 40px;
          border-radius: 10px;
          margin: 0 10px;
          border: 2px solid rgba(255, 255, 255, .2);
          background: rgba(173, 160, 160, 0.1);
          backdrop-filter: blur(50px)
        
        }
        .wrapper h1{
          font-size: 40px;
          text-align: center;
          font-family: "Open Sans", sans-serif;
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
          border: 2px solid black;
          border-radius: 40px;
          font-size: 16px;
          color: black;
          padding: 20px 45px 20px 20px;
        }
        
        .input-box input::placeholder{
          color: black;
        }

        .input-box i {
          position: absolute;
          right: 20px;
          top: 50%;
          transform: translateY(-50%);
          font-size: 20px;
        }

        .wrapper .remember-forgot{
          display: flex;
          justify-content: space-between;
          font-size: 14.5px;
          margin: -15px 0 15px;
        }
        .remember-forgot label input{
          accent-color: black;
          margin-right: 3px;
        }
        .remember-forgot a{
          color: navy;
          text-decoration: none;

        }
        .remember-forgot a:hover{
          text-decoration: underline;

        }
        .wrapper .btn-primary{
          width: 100%;
          height: 45px;
          border: none;
          outline: none;
          border-radius: 40px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 1.);
          color: #fff;
          font-weight: 600;
        }
        .wrapper .register-link{
          font-size: 14.5px;
          text-align: center;
          margin: 20px 0 15px;
        }
        .register-link p a {
          color:navy;
          text-decoration: none;
          font-weight: 600;
        }

        .register-link p a:hover{
          text-decoration: underline;
        } 
        .main-menu i{
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

        <form action="login_process.php" method="post">
            <h1><b>Giriş Yap</b></h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class="bi bi-person-circle"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Şifre" required>
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Beni Hatırla</label>
                <a href="#">Şifrenizi mi unuttunuz?</a>
            </div>

            <button type="submit" class="btn-primary">Giriş Yap</button>

            <div class="register-link">
                <p>Hesabınız yok mu? <a href="register.php">Kayıt Ol</a></p>
            </div>
        </form>
    </div>

    <!-- Vendor JS Files -->
    <script src="vendor/purecounter/purecounter.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>
</body>

</html>
