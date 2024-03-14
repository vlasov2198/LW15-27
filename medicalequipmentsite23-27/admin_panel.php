<!-- задание 24.3 -->
<?php
session_start();

// Проверяем, авторизован ли пользователь
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Перенаправляем на страницу входа, если пользователь не авторизован
    exit;
}

if(isset($_GET['logout'])) {
    session_unset(); 
    session_destroy(); 
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Добро пожаловать в админ-панель!</h1>
        <p>Здесь ваш контент для администратора сайта.</p>
        <a href="?logout=true" class="logout-link">Выйти</a>
    </div>
</body>
</html>