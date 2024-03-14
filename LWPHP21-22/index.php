<?php

include 'task2.php';
include 'task3.php';

// Задание 4
$students = array(
    "Иванов" => 200,
    "Петров" => 340,
    "Сидоров" => 800
);

// Выводим массив с именами ключей
foreach ($students as $name => $stipend) {
    echo "Студент: " . $name . ", Стипендия: $" . $stipend . "<br>";
}

// Суммируем стипендии
$total_stipend = array_sum($students);
echo "Суммарная величина начисленной стипендии: $" . $total_stipend . "<br>";

// Задание 5
$s1 = "Я люблю Беларусь";
$s2 = "I echiwdawad";

// Определение длины строки S2
$length_s2 = strlen($s2);
echo "Длина строки S2: " . $length_s2 . "<br>";

// Встречается ли в строке S1 слово Гродно
if (strpos($s1, "Гродно") !== false) {
    echo "Слово 'Гродно' встречается в строке S1<br>";
} else {
    echo "Слово 'Гродно' не встречается в строке S1<br>";
}

// Выделение n-ого символа в строке S2 и определение ASCII-кода
$n = 6;
$char_n = $s2[$n-1];
$ascii_code = ord($char_n);
echo "n-ый символ в строке S2: " . $char_n . ", ASCII-код: " . $ascii_code . "<br>";

// Задание 6
function custom_formula($a, $b, $c, $x) {
    return 1 / sqrt($a * $x**2 + $b * $x + $c);
}


$a_value = 2;
$b_value = 3;
$c_value = 1;
$x_value = 4;
$result = custom_formula($a_value, $b_value, $c_value, $x_value);
echo "Результат расчета по формуле: " . $result . "<br>";
?>
