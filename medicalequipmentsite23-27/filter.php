<link rel="stylesheet" href="css/style.css">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medsite";

$connection = new mysqli($servername, $username, $password, $dbname);

// Получение запроса поиска из URL-параметра
$category = $_GET['category'];

// Формируем SQL запрос для фильтрации товаров по категории
$sql = "SELECT * FROM products WHERE category = '$category'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Выводим данные каждого товара
    while($row = $result->fetch_assoc()) {
        echo '<div class="wrapper">';
        echo '<div class="second_box__medical_equipment">';
        echo '<div class="second_box__medical_equipment_little_item">';
        echo '<div class="second_box__medical_equipment_item__info">';
        echo '<div class="second_box__medical_equipment_item__info__title">' . $row["title"] . '</div>';
        echo '<div class="second_box__medical_equipment_item__info__title_other">';
        echo '<div class="second_box__medical_equipment_item__info__title_other"> Цена товара:' . $row["price"] . '</div>';
        echo '<a href="#" class="">добавить в корзину</a>';
        echo '</div>';
        echo '</div>';
        echo '<div class="second_block__big_item_img">';
        echo '<img src="' . $row["image_url"] . '" alt="Image">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Товары данной категории не найдены";
}
$connection->close();
?>
