<?php
session_start();

// Уничтожение сессии и перенаправление на главную страницу
$_SESSION['auth'] = false;
$_SESSION['idrolle']= 0;
header("Location: glavnaya.php");
exit();
?>
