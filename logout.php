<?php
session_start();
session_destroy(); // Tüm oturum verilerini sil
header("Location: index.php");
exit;
?>
