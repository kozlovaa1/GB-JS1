<?php
/*1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
ноль можно считать положительным числом.*/
echo 'Задание 1<br>';

$a = rand(-getrandmax() / 2, getrandmax() / 2);
$b = rand(-getrandmax() / 2, getrandmax() / 2);

if ($a >= 0 && $b >= 0) {
    echo $a - $b;
} elseif ($a < 0 && $b < 0) {
    echo $a * $b;
} else {
    echo $a + $b;
}
echo '<br>';

/*2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.*/
echo 'Задание 2<br>';

$a = rand(0, 15);
switch ($a) {
    case 0:
        echo $a . '<br>';
        $a++;
    case 1:
        echo $a . '<br>';
        $a++;
    case 2:
        echo $a . '<br>';
        $a++;
    case 3:
        echo $a . '<br>';
        $a++;
    case 4:
        echo $a . '<br>';
        $a++;
    case 5:
        echo $a . '<br>';
        $a++;
    case 6:
        echo $a . '<br>';
        $a++;
    case 7:
        echo $a . '<br>';
        $a++;
    case 8:
        echo $a . '<br>';
        $a++;
    case 9:
        echo $a . '<br>';
        $a++;
    case 10:
        echo $a . '<br>';
        $a++;
    case 11:
        echo $a . '<br>';
        $a++;
    case 12:
        echo $a . '<br>';
        $a++;
    case 13:
        echo $a . '<br>';
        $a++;
    case 14:
        echo $a . '<br>';
        $a++;
    case 15:
        echo $a . '<br>';
}
echo '<br>';

/*3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.*/
echo 'Задание 3<br>';

function sum($x, $y)
{
    return $x + $y;
}

function subtract($x, $y)
{
    return $x - $y;
}

function multiply($x, $y)
{
    return $x * $y;
}

function divide($x, $y)
{
    if ($y != 0) {
        return $x / $y;
    } else {
        echo 'Делить на 0 нельзя.';
        return NULL;
    }
}

echo '<br>';
/*4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).*/
echo 'Задание 4<br>';

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case 'sum':
            return sum($arg1, $arg2);
            break;
        case 'subtract':
            return subtract($arg1, $arg2);
            break;
        case 'multiply':
            return multiply($arg1, $arg2);
            break;
        case 'divide':
            return divide($arg1, $arg2);
            break;
        default:
            return NULL;
            echo 'Введено неверное значение оператора';
    }
}

echo '<br>';
/*5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.*/
echo 'Задание 5<br>';
$year = date('Y');
echo '<br>';

/*6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.*/
echo 'Задание 6<br>';
function power($val, $pow)
{
    if ($pow == 0) {
        return 1;
    } else if ($pow == 1) {
        return $val;
    } else if ($pow > 0) {
        $temp = $val * power($val, $pow - 1);
        return $temp;
    } else {
        $temp = 1 / $val * power($val, $pow + 1);
        return $temp;
    }
}

echo '<br>';

/*7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты*/
echo 'Задание 7<br>';

function curTime()
{
    $hours = date('G');
    $minutes = (int)date('i');
    if ($hours < 5 || $hours > 20) {
        if ($hours % 10 == 1) {
            $hoursText = ' час ';
        } else {
            $hoursText = ' часа ';
        }
    } else {
        $hoursText = ' часов ';
    }
    if ($minutes < 5 || $minutes > 20) {
        if ($minutes % 10 == 1) {
            $minutesText = ' минута';
        } else {
            $minutesText = ' минуты';
        }
    } else {
        $minutesText = ' минут';
    }
    echo $hours . $hoursText . $minutes . $minutesText;
}

curTime();

