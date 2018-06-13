/*1) Дан код:

var a = 1, b = 1, c, d;
c = ++a; alert(c); // 2
- c присваевается значение 1+a=2. a присваивается значение a+1=2.
d = b++; alert(d); // 1
- d присваивается зачение b=1. b присваивается значение b+1=2
c = (2+ ++a); alert(c); // 5
- с присваивается значение 2+1+a=5. a присваивается значение a+1=3
d = (2+ b++); alert(d); // 4
- d присваивается зачение 2+b=4. b присваивается значение b+1=3
alert(a); // 3
alert(b); // 3*/

/*2) Чему будет равен x в примере ниже?

var a = 2;
var x = 1 + (a *= 2);
x равен 5*/

/*3) Объявить две целочисленные переменные a и b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
    * если a и b положительные, вывести их разность;
* если а и b отрицательные, вывести их произведение;
* если а и b разных знаков, вывести их сумму;
ноль можно считать положительным числом.*/
var a = 1, b = -1;
if (a >= 0 && b >= 0) {
    console.log(a - b);
} else if (a < 0 && b < 0) {
    console.log(a * b);
} else {
    console.log(a + b);
}

// 4) Присвоить переменной а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от a до 15.
a = Math.round(Math.random() * 15);
switch (a) {
    case 0:
        console.log(a);
        a++;
    case 1:
        console.log(a);
        a++;
    case 2:
        console.log(a);
        a++;
    case 3:
        console.log(a);
        a++;
    case 4:
        console.log(a);
        a++;
    case 5:
        console.log(a);
        a++;
    case 6:
        console.log(a);
        a++;
    case 7:
        console.log(a);
        a++;
    case 8:
        console.log(a);
        a++;
    case 9:
        console.log(a);
        a++;
    case 10:
        console.log(a);
        a++;
    case 11:
        console.log(a);
        a++;
    case 12:
        console.log(a);
        a++;
    case 13:
        console.log(a);
        a++;
    case 14:
        console.log(a);
        a++;
    case 15:
        console.log(a)
}

// 5) Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.
function sum(x, y) {
    return x + y;
}

function subtract(x, y) {
    return x - y;
}

function multiply(x, y) {
    return x * y;
}

function divide(x, y) {
    if (y != 0) {
        return x / y;
    }
    else {
        console.log('Делить на 0 нельзя.')
    }
}

var x = parseInt(prompt('Введите значение x'));
var y = parseInt(prompt('Введите значение y'));
console.log('Сумма x и y равна ' + sum(x, y));
console.log('Разность x и y равна ' + subtract(x, y));
console.log('Произведение x на y равно ' + multiply(x, y));
console.log('Частное от деления x на y равно ' + divide(x, y));

// 6) Реализовать функцию с тремя параметрами: function mathOperation(arg1, arg2, operation), где arg1, arg2 – значения аргументов, operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
function mathOperation(arg1, arg2, operation) {
    switch (operation) {
        case 'sum':
            return sum(arg1, arg2);
            break;
        case 'subtract':
            return subtract(arg1, arg2);
            break;
        case 'multiply':
            return multiply(arg1, arg2);
            break;
        case 'divide':
            return divide(arg1, arg2);
            break;
        default:
            return NaN;
            console.log('Введено неверное значение оператора');
    }
}

x = parseInt(prompt('Введите значение x'));
y = parseInt(prompt('Введите значение y'));
var oper = prompt('Введите значение оператора (sum, subtract, multiply или divide)');
console.log(mathOperation(x, y, oper));


// 7) * Сравнить null и 0. Попробуйте объяснить результат.
console.log(null == 0); //false -> так как null - неопределённая величина, а 0 - определённая.
console.log(null != 0); //true -> так как null - неопределённая величина, а 0 - определённая.
//При проведении операции сравнения (> или <) происходит преобразование к типу Number. В результате получаем вместо null +0
console.log(null > 0); //false -> +0 не больше 0
console.log(null < 0); //false -> +0 не меньше 0
//Для операторов >= и <= срабатывает правило:
//Если null < 0 принимает значение false, то null >= 0 принимает значение true
//Если null > 0 принимает значение false, то null <= 0 принимает значение true
console.log(null >= 0); //true
console.log(null <= 0); //true



// 8) * С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power(val, pow), где val – заданное число, pow – степень.
//Работает только для целых чисел!
function power(val, pow) {
    if (pow == 0) {
        return 1;
    }
    else if (pow == 1) {
        return val;
    }
    else if (pow > 0) {
        var temp = val * power(val, pow - 1);
        return temp;
    }
    else {
        temp = 1 / val * power(val, pow + 1);
        return temp;
    }
}

x = parseInt(prompt('Введите значение основания'));
y = parseInt(prompt('Введите значение степени'));
console.log('Значение x в степени y равно ' + power(x, y));