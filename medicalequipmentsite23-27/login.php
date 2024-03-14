<!-- задание 24.3 -->
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medsite";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем, была ли отправлена форма с данными для входа
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username']; // Получаем логин из формы
    $password = $_POST['password']; // Получаем пароль из формы

    // Запрос к базе данных для проверки логина и пароля
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['admin_logged_in'] = true; // Устанавливаем флаг авторизации в сессии
        header("Location: admin_panel.php"); // Перенаправляем на админ-панель
        exit;
    } else {
        echo "Неверный логин или пароль!"; // Выводим сообщение об ошибке
    }
}
$conn->close(); // Закрываем соединение с базой данных
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в личный кабинет</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <div class="container">
    <h1>Авторизация в личный кабинет</h1>
        <form method="POST">
            <div class="form-group">
                <label for="username">Логин:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password">
            </div>
            <input type="submit" value="Войти">
        </form>
    </div>
</body>
</html>