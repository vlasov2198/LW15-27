<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medsite";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// задание 23.2 и 24.2
// логирование входа на сайт в файл и установка cookie при входе на сайт
$log_file = "log.log";
$user_ip = $_SERVER['REMOTE_ADDR'];
$date_time = date('Y-m-d H:i:s');
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$log_entry = "\n\nПользователь с IP-адресом $user_ip вошел на сайт в $date_time.\nБраузер: $user_agent\n";
$log_handle = fopen($log_file, 'a');
if ($log_handle === false) {
    die("Не удалось открыть файл журнала.");
}
fwrite($log_handle, $log_entry);
fclose($log_handle);
?>


<?php
// задание 23.2 и 24.2 логирование входа на сайт в файл и установка cookie при входе на сайт
$user_ip = $_SERVER['REMOTE_ADDR'];
$date_time = date('Y-m-d H:i:s');
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Формируем строку с данными пользователя
$user_info = "IP: $user_ip, Дата и время входа: $date_time, Браузер: $user_agent";

// Кодируем данные
$user_info_encoded = urlencode($user_info);

// Устанавливаем cookie с закодированными данными
setcookie('user_info', $user_info_encoded, time() + (86400 * 30), "/"); // 86400 = 1 день

    // Записываем информацию о входе в лог-файл
    $log_file = "log.log";
    $log_entry = "\n\nПользователь с IP-адресом $user_ip вошел на сайт в $date_time.\nБраузер: $user_agent\n";
    $log_handle = fopen($log_file, 'a');
    if ($log_handle === false) {
      die("Не удалось открыть файл журнала.");
    }
    fwrite($log_handle, $log_entry);
    fclose($log_handle);
    ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Дефибрилляторы</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="style.css">
  <!-- иконка -->
  <link rel="icon" type="image/png" href="img/svg/ico.svg">
  <!-- подключение библиотеки jquery -->
  <script defer src="js/jquery.js"></script>
  <script defer src="js/slick.min.js"></script>
  <script defer src="js/scripts.js"></script>
</head>

<body>
  <!-- кнопка скрола -->
  <a href="#" class="scrollup"></a>
  <!-- кнопка вызова -->
  <a href="#" class="call"></a>
  <!-- элементы выплывающего изображения при наведении для брендов -->
  <div class="brand_overlay"></div>
  <div class="enlarged_img"></div>
  <!-- шапка -->
  <header class="header">
    <div class="wrapper">
      <div class="header__wrapper_first">
        <div class="header__logo">
          <a href="#" class="header__logo-link">
            <img src="img/svg/logo.svg" alt="Primedic">
          </a>
        </div>
        <div class="header__catalog">
        <div class="header__catalog__logo">
          <a href="#" class="header__catalog__logo-link">
            <img src="img/logo_menu_catalog.png" alt="Каталог">
          </a>
        </div>
        <div class="header__catalog__txt">
          <a href="#" class="header__catalog-link">КАТАЛОГ</a>
        </div>
      </div>
        <div class="header__search">
          <input type="text" class="header__search-field" placeholder="Поиск медицинского оборудования">
          <img src="img/logo_loupe.png" alt="Лупа" class="header__search-icon">
        </div>
        <div class="header__call_tel-link">
          <a href="#" class="header__call_tel">📞Заказать обратный звонок</a>
        </div>
        <div class="header__tel_number">8 (3412) 65-08-77
        </div>
        <div class="header__contacts">
        <div class="header__viber-icon">
          <a href="#" class="header__viber__logo-link">
          <img src="img/logo_viber.png" alt="Вайбер">
          </a>
        </div>
        <div class="header__telegram-icon">
          <a href="#" class="header__telegram__logo-link">
          <img src="img/logo_telegram.png" alt="Телеграм">
          </a>
        </div>
        <div class="header__whatsapp-icon">
          <a href="#" class="header__whatsapp__logo-link">
          <img src="img/logo_whatsapp.png" alt="whatsapp">
          </a>
        </div>
      </div>
    </div>
      <div class="header__wrapper_second">
        <button class="header__burger-btn" id="burger">
          <span></span><span></span><span></span>
        </button>
        <nav class="header__nav">
          <ul class="header__list">
            <li class="header__item">
              <a href="#" class="header__link">О компании</a>
            </li>
            <li class="header__item">
              <a href="#" class="header__link">Производители</a>
            </li>
            <li class="header__item">
              <a href="#" class="header__link">Доставка</a>
            </li>
            <li class="header__item">
              <a href="#" class="header__link">Оплата</a>
            </li>
            <li class="header__item">
              <a href="#" class="header__link">Новости</a>
            </li>
            <li class="header__item">
              <a href="#" class="header__link">Реквизиты</a>
            </li>
            <li class="header__item">
              <a href="#" class="header__link">Контакты</a>
            </li>
          </ul>
      </nav>
      <div class="header__right__menu">
          <div class="header__right_menu_item">
          <a href="#" class="header__right_menu_item__logo-link">
            <img src="img/logo_polylines.png" alt="Polylines">
          </a>
          <div class="header__right_menu_item_in">
            <a href="#" class="header__right_menu_item-link">Сравнения</a>
          </div>
          </div>  
          <div class="header__right_menu_item">
            <a href="#" class="header__right_menu_item__logo-link">
              <img src="img/logo_shopping-cart.png" alt="shopping-cart">
            </a>
            <div class="header__right_menu_item">
              <a href="#cart.php" class="header__right_menu_item-link">Корзина</a>
            </div>
            </div>
            <div class="header__right_menu_item">
              <a href="#" class="header__right_menu_item__logo-link">
                <img src="img/logo_doctor.png" alt="doctor">
              </a>
              <!-- задание 24.3 и 24.1 -->
              <div class="header__right_menu_item">
                <a href="login.php" class="header__right_menu_item-link">Личный кабинет</a>
              </div>
              </div>
      </div>
    </div>
  </div>
  </header>
  <!-- основной блок -->
  <main class="main">
    <div class="wrapper">
    <div class="user-info">
</div>
    <section class="first__section">
      <div class="first_box" id="hiden_box">
        <div class="wrapper__first_box">
          <div class="first_box__all_info">
            <img src="img/first_blok_PRIMEDIC.png" alt="PRIMEDIC" class="first_box__img">
            <div class="first_box__info">
              <h1 class="first_box__title">Ручные и автоматические дефибрилляторы «Primedic»</h1>
              <div class="first_box__other_text">
                <?php
                // задание 23.1
                // доставание информации из файла для вывода на сайте
                $file_path = "info.txt";

                if (file_exists($file_path)) {
                    $info = file_get_contents($file_path);
          
                    echo $info;
                } else {
                    echo "Файл с информацией не найден.";
                }
                ?>
            </div>
            </div>
            <div class="first_box__slider">
              <button class="firt_box__go_to_directory">Перейти к каталог</button>
              <button class="first_box__slider_button_back"><img src="img/firt_block_next.png" alt="" class=""></button>
              <button class="first_box__slider_button_next"><img src="img/firt_block_next.png" alt="" class=""></button>
            </div>
          </div>
        </div>
        <img src="img/first_block_img1.png" alt="" class="first_block_img1">
      </div>
    </section>

      <div class="second_box">
        
        <div class="title">Медицинское оборудование</div>
      
        </form>
          <form action="" method="GET">
          <label for="sort">Сортировать по:</label>
          <select name="sort" id="sort">
          <option value="title">Названию</option>
          <option value="price">Цене</option>
          </select>
          <button type="submit">Применить</button>
          </form>


          <form action="filter.php" method="GET">
        <label for="category">Выберите категорию:</label>
        <select name="category" id="category">
        <option value="ДЕФИБРИЛЯТОРЫ">Дефибрилляторы</option>
        <option value="СШИВАЮЩИЕ ИНСТРУМЕНТЫ">Сшивающие инструменты</option>
        <option value="МЕДИЦИНСКИЙ ИНСТРУМЕНТ">Медицинский инструмент</option>
        <option value="КИСЛОРОДНОЕ ОБОРУДОВАНИЕ">Кислородное оборудование</option>
       </select>
        <button type="submit" name="submit">Показать продукты</button>
      </form>


          <!-- поиск -->
        <form action="search.php" method="GET">
        <input type="text" name="query" placeholder="Поиск продукции">
        <button type="submit">Найти</button>
        </form>
        <div class="second_box__medical_equipment" id="hiden_med_eq">
              <?php

                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "medsite";

                  $conn = new mysqli($servername, $username, $password, $dbname);

                  if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  }
      
                  $sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'title';
      
                  if(in_array($sort_by, array('title', 'price'))) {
                      $sql = "SELECT * FROM products ORDER BY $sort_by";
                      $result = $conn->query($sql);
      
                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                              echo '<div class="second_box__medical_equipment_little_item">';
                              echo '<div class="second_box__medical_equipment_item__info">';
                              echo '<div class="second_box__medical_equipment_item__info__title">' . $row["title"] . '</div>';
                              echo '<div class="second_box__medical_equipment_item__info__title_other">';
                              echo '<a href="#" class="">добавить в корзину</a>';
                              echo '<div class="second_box__medical_equipment_item__info__title_other"> Цена товара:' . $row["price"] . '</div>';
                              echo '</div>';
                              echo '</div>';
                              echo '<div class="second_block__big_item_img">';
                              echo '<img src="' . $row["image_url"] . '" alt="Image">';
                              echo '</div>';
                              echo '</div>';
                          }
                      } else {
                          echo "0 результатов";
                      }
                  } else {
                      echo "Недопустимый критерий сортировки.";
                  }
      
                  $conn->close();
                  ?>

                
        </div>
        </div>
      </div>
      <div class="third_box">
        <div class="title">
          Новинки
        </div>
      <div class="wrapper_slider">
      <div class="slider">
      <div class="product-card">
        <img class="product-image" src="img/slider_first.png" alt="Product Image">
        <p class="product-sku">арт. 97530</p>
        <h3 class="product-title">АВТОМАТИЧЕСКИЙ ДЕФИБРИЛЛЯТОР PRIMEDIC HEARTSAVE PAD</h3>
        <p class="product-price">136 000₽</p>
        <div class="product-buttons">
          <button>В корзину</button>
          <button>Купить</button>
        </div>
      </div>
      <div class="product-card">
        <img class="product-image" src="img/slider_second.png" alt="Product Image">
        <p class="product-sku">арт. 97530</p>
        <h3 class="product-title">ДЕФИБРИЛЛЯТОР-МОНИТОР ДКИ-Н-11</h3>
        <p class="product-price">150 000₽</p>
        <div class="product-buttons">
          <button>В корзину</button>
          <button>Купить</button>
        </div>
      </div>
      <div class="product-card">
        <img class="product-image" src="img/slider_third.png" alt="Product Image">
        <p class="product-sku">арт. 97530</p>
        <h3 class="product-title">АВТОМАТИЧЕСКИЙ ДЕФИБРИЛЛЯТОР PRIMEDIC HEARTSAVE AS</h3>
        <p class="product-price">150 000₽</p>
        <div class="product-buttons">
          <button>В корзину</button>
          <button>Купить</button>
        </div>
      </div>
      <div class="product-card">
        <img class="product-image" src="img/slider_fourth.png" alt="Product Image">
        <p class="product-sku">арт. 97530</p>
        <h3 class="product-title">АВТОМАТИЧЕСКИЙ ДЕФИБРИЛЛЯТОР PRIMEDIC HEARTSAVE PAD</h3>
        <p class="product-price">136 000₽</p>
        <div class="product-buttons">
          <button>В корзину</button>
          <button>Купить</button>
        </div>
      </div>
      <div class="product-card">
        <img class="product-image" src="img/slider_third.png" alt="Product Image">
        <p class="product-sku">арт. 97530</p>
        <h3 class="product-title">Пневматический аппарат ИВЛ и ингаляции А-ИВЛ/ВВЛП-3/30</h3>
        <p class="product-price">136 000₽</p>
        <div class="product-buttons">
          <button>В корзину</button>
          <button>Купить</button>
        </div>
      </div>
    </div>
  </div>
  </div>
    <div class="wrapper">
      <div class="box_brands">
        <div class="title_brands">
          Бренды и заводы производители
        </div>
      <div class="brand_grid-container" id="hiden_brands">
        <div class="brand_grid-item">
          <div class="brand_grid_box_item">
            <img src="img/svg/brand1.svg" alt="Image">
          </div>
        </div>
        <div class="brand_grid-item">
          <div class="brand_grid_box_item">
            <img src="img/svg/brand2.svg" alt="Image">
          </div>
        </div>
        <div class="brand_grid-item">
          <div class="brand_grid_box_item">
            <img src="img/svg/brand3.svg" alt="Image">
          </div>
        </div>
        <div class="brand_grid-item">
          <div class="brand_grid_box_item">
            <img src="img/svg/brand4.svg" alt="Image">
          </div>
        </div>
        <div class="brand_grid-item">
          <div class="brand_grid_box_item">
            <img src="img/svg/brand5.svg" alt="Image">
          </div>
        </div>
        <div class="brand_grid-item">
          <div class="brand_grid_box_item">
            <img src="img/svg/brand6.svg" alt="Image">
          </div>
        </div>
        <div class="brand_grid-item">
          <div class="brand_grid_box_item">
            <img src="img/svg/brand7.svg" alt="Image">
          </div>
        </div>
        <div class="brand_grid-item">
          <div class="brand_grid_box_item">
            <img src="img/svg/brand8.svg" alt="Image">
          </div>
        </div>
        <div class="brand_grid-item">
          <div class="brand_grid_box_item">
            <img src="img/svg/brand9.svg" alt="Image">
          </div>
        </div>
        <div class="brand_grid-item">
          <div class="brand_grid_box_item">
            <img src="img/svg/brand10.svg" alt="Image">
          </div>
        </div>
      </div>
    </div>
    <div class="email-container">
        <h2>Отправить письмо</h2>
        <form action="send_email.php" method="post" class="email-form">
            <div class="email-group">
                <label for="user_email">Ваш Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="email-group">
              <select name="subject">
                <option disabled selected>Тема письма</option>
                <option value="1">Вопрос по оборудованию</option>
                <option value="2">Личный вопрос</option>
                <option value="3">Благодарность</option>
              </select>
            </div>
            <div class="email-group">
                <label for="message">Сообщение:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit">Отправить</button>
        </form>

 
    </div>
    <div class="title">Последние новости</div>
    <div class="news-container">
            <?php


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "medsite";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Проверка соединения
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
            // Формируем SQL запрос для выборки статей
      $sql = "SELECT * FROM articles";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Выводим данные каждой статьи
        while($row = $result->fetch_assoc()) {
          echo '<div class="news-card">';
          echo '<img src="' . $row["image_url"] . '" alt="News Image">';
          echo '<div class="middle-row">';
          echo '<div class="date">' . $row["publication_date"] . '</div>';
          echo '<h2>' . $row["title"] . '</h2>';
          echo '</div>';
          echo '<div class="bottom-row">';
          echo '<a class="read-more" href="#">Читать дальше &gt;</a>';
          echo '<div class="author">Категория: ' . $row["category"] . '</div>';
          echo '<div class="author">Автор: ' . $row["author"] . '</div>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo "0 результатов";
      }
      $conn->close();
      ?>
    </div>
  </div>
  </div>

  </main>
  <!-- подвал -->
  <footer class="footer">
    <div class="wrapper">
      <div class="footer_text">
        <div class="footer_list_nav">
          <img src="img/svg/logo.svg" alt="" class="">
          <div class="header__contacts">
            <div class="header__viber-icon">
              <a href="#" class="header__viber__logo-link">
              <img src="img/logo_viber.png" alt="Вайбер">
              </a>
            </div>
            <div class="header__telegram-icon">
              <a href="#" class="header__telegram__logo-link">
              <img src="img/logo_telegram.png" alt="Телеграм">
              </a>
            </div>
            <div class="header__whatsapp-icon">
              <a href="#" class="header__whatsapp__logo-link">
              <img src="img/logo_whatsapp.png" alt="whatsapp">
              </a>
            </div>
          </div>
        </div>
          <nav class="footer_nav">
            <ul class="footer_list_nav">
              <li class="footer_item-nav">
                <a href="#" class="footer_link">О компании</a>
              </li>
              <li class="footer_item-nav">
                <a href="#" class="footer_link">Производители</a>
              </li>
              <li class="footer_item-nav">
                <a href="#" class="footer_link">Доставка</a>
              </li>
              <li class="footer_item-nav">
                <a href="#" class="footer_link">Оплата</a>
              </li>
            </ul>
          </nav>
          <nav class="footer_nav">
            <ul class="footer_list_nav">
              <li class="footer_item-nav">
                <a href="#" class="footer_link">Каталог</a>
              </li>
              <li class="footer_item-nav">
                <a href="#" class="footer_link">Новости</a>
              </li>
              <li class="footer_item-nav">
                <a href="#" class="footer_link">Реквизиты</a>
              </li>
              <li class="footer_item-nav">
                <a href="#" class="footer_link">Контакты</a>
              </li>
            </ul>
          </nav>
          <div class="footer_list_nav">
            <a href="#">
            <div class="footer_info">
              📞Заказать обратный звонок
            </div>
            </a>
            <div class="footer_info">
              Россия, Удмуртская Республика 426011, г. Ижевск, ул. Пушкинская 290 тел. 8 (3412) 65-08-77
            </div>
          </div>
          <div class="footer_list_nav">
                <a href="#">
                <div class="footer_info">
                  Политика конфиденциальности
                </div>
              </a>
            <div class="footer_info">
              ООО «Boksmed» © 2015 - 2023. Сайт носит информационный характер и не является публичной офертой. Copyright: <a href="https://github.com/vlasov2198">vlasov2198</a>
            </div>
          </div>
      </div>
    </div>
  </footer>
</body>
</html> 

