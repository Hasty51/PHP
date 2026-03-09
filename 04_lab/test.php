<?php
$arr = [1, 2, 3];

print_r($arr);

// или

var_dump($arr);
echo '<pre>';
print_r($arr);

function sum(int|float $a, int|float $b): int|float {
    return $a + $b;
}

// Вызов функции
echo sum(3, 5); // Вывод: 8
echo sum(2.5, 4.5); // Вывод: 7

function firstFunction() {
    // Объявление функции внутри другой функции
    function secondFunction() {
        echo "Я не существую, пока не вызовут firstFunction().";
    }
}

// Попытка вызвать secondFunction() до вызова firstFunction()
// приведёт к ошибке:
// secondFunction(); // Ошибка: Call to undefined function

// После вызова firstFunction() происходит объявление secondFunction()
firstFunction();

// Теперь функция secondFunction() доступна
secondFunction(); // Вывод: Я не существую, пока не вызовут firstFunction().
function executeOperation(callable $callback, int $a, int $b): int {
    return $callback($a, $b);
}

function multiply(int $a, int $b): int {
    return $a * $b;
}

// Передаём имя функции как callback
echo executeOperation('multiply', 4, 5); // 20


//Иногда удобно хранить набор функций в массиве и вызывать их по ключу. Это напоминает стратегию выбора поведения.

function add(int $a, int $b): int {
    return $a + $b;
}

function subtract(int $a, int $b): int {
    return $a - $b;
}

$operations = [
    'sum' => 'add',
    'diff' => 'subtract'
];

echo $operations['sum'](10, 3);  // 13
echo $operations['diff'](10, 3); // 7






/*
 * Обновляет конфигурацию приложения.
 *
 * @param array &$config Конфигурационный массив, который нужно обновить.
 * @param string $key Ключ конфигурации.
 * @param mixed $value Новое значение для ключа.
 */
function updateConfig(array &$config, string $key, $value): void {
    $config[$key] = $value;
}

// Изначальная конфигурация
$appConfig = [
    'debug' => false,
    'timezone' => 'UTC',
    'language' => 'en',
];

// Обновление конфигурации
updateConfig($appConfig, 'debug', true);
updateConfig($appConfig, 'language', 'ru');

print_r($appConfig);

$tax1 = 0.2;

$calculatePrice = function ($price) use ($tax1) {
    return $price + ($price * $tax1);
};

echo $calculatePrice(100); // 120

$taxes = [
    'food' => 0.1,
    'electronics' => 0.2,
    'clothing' => 0.15
];

$newTaxes = array_map(function ($tax) {
    return $tax * 1.05; // Увеличиваем налог на 5%
}, $taxes);

print_r($newTaxes);
// Вывод: Array ( [food] => 0.105 [electronics] => 0.21 [clothing] => 0.1575 )



//zamicanie
function createMultiplier($factor) {
    return function ($num) use ($factor) {
        return $num * $factor;
    };
}

$double = createMultiplier(2);
$triple = createMultiplier(3);

echo $double(4); // 8
echo $triple(4); // 12
