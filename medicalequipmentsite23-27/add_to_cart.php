<?php
session_start();

// Проверяем, есть ли товары в корзине
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Создаем подключение к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "medsite";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Формируем список идентификаторов товаров для запроса
    $product_ids = implode(',', array_column($_SESSION['cart'], 'id'));

    // Запрос на выборку товаров из корзины
    $sql = "SELECT * FROM products WHERE id IN ($product_ids)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Выводим товары в корзине
        while($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            echo '<img src="' . $row["image_url"] . '" alt="Product Image">';
            echo '<h3>' . $row["title"] . '</h3>';
            echo '<p>' . $row["description"] . '</p>';
            echo '<p>Price: $' . $row["price"] . '</p>';
            echo '</div>';
        }
    } else {
        echo "Продукция не найдена";
    }

    $conn->close();
} else {
    echo "Корзина пуста";
}
?>
