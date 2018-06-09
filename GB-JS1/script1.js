alert('Задание 1');
var tempCel = parseInt(prompt('Введите температуру в градусах Цельсия'));
if (isNaN(tempCel)) {
    alert('Вы ввели не число!')
} else {
    var tempFar = (9 / 5) * tempCel + 32;
    alert('Температура в градусах Фаренгейта равна: ' + tempFar);
}

alert('Задание 3');
var name = 'Василий';
var admin = name;
alert(admin);

alert('Задание 4');
alert(1000 + '108');
//->1000108. Оператор конкатенации склеивает число и строку в строку.


