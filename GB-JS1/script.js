// 1) Написать функцию, преобразующую число в объект. Передавая на вход число от 0 до 999, мы должны получить на выходе объект, в котором в соответствующих свойствах описаны единицы, десятки и сотни. Например, для числа 245 мы должны получить следующий объект: {‘единицы’: 5, ‘десятки’: 4, ‘сотни’: 2}. Если число превышает 999, необходимо выдать соответствующее сообщение с помощью console.log и вернуть пустой объект.
var numberObj = {};
var number = 123;
getObject(number);
console.log(numberObj);

function getObject(number) {
    if (isNaN(number)) {
        alert('Задано не число')
    }
    else {
        var digits = number.toString().split(''); // приводим число к строке и разбиваем на элементы массива посимвольно

        if (digits.length <= 3) {
            numberObj.ones = digits[2];
            numberObj.tens = digits[1];
            numberObj.hundreds = digits[0];
        }
        else {
            alert('Число не входит в диапазон от 0 до 999')
        }
    }
}

// 2) Для игры, реализованной на уроке, добавить возможность вывода хода номер n (номер задается пользователем)
//var number = []; // четыре цифры нашего числа
var attempts = 0; // число попыток
var allResult = []; //массив для хранения результатов всех попыток

generateNumber(); //сгенерировали неповторяющиеся значения массива
alert(number);
guessNumber();

while (confirm('Хотите просмотреть один из ходов?')) {
    checkAttempts(); // Выводим результат выбранного хода
}

function generateNumber() {
    number = [];//массив с уникальными цифрами
    var min = 0;
    var max = 9;

    // заполняем массив цифр в числе
    for (var i = 0; i < 4; i++) {
        var part = Math.round(Math.random() * (max - min) + min);

        // первое число всегда уникально
        if (i == 0) {
            number[0] = part;
        }
        else {
            // пока не сгенерируется уникальное число, генерируем новые случайные числа
            while (number.indexOf(part) != -1) {//элемент найден
                part = Math.round(min + Math.random() * (max - min));
            }

            number[i] = part;
        }
    }
}

function guessNumber() {
    var result = prompt("Введите число (-1 - закончить игру)", 0);
    var gameIsRunning = true;

    // пока игрок не угадал число
    while (gameIsRunning) {
        // выход из игры
        if (parseInt(result) == -1) {
            gameIsRunning = false;
            allResult[attempts] = result + '. Вы прервали игру.';
        }
        // игрок ввел некорректные данные
        else if (parseInt(result) == 0 || isNaN(parseInt(result))) {
            alert("Вы не ввели число");
            // запрашиваем по новой
            result = prompt("Введите число (-1 - закончить игру)", 0);
            allResult[attempts] = result;
        }
        // проверяем число
        else {
            var answer = checkNumber(result);//answer[false,1,1]
            allResult[attempts] = result + ". Быки: " + answer[1] + " Коровы: " + answer[2] + ".";
            if (answer[0]) {
                // число угадано
                alert("Поздравляем! Вы угадали число. Кол-во попыток: " + attempts);
                allResult[attempts] = allResult[attempts] + ' Игра окончена, вы победили.';
                // останавливаем игру
                gameIsRunning = false;
            }
            else {
                // следующий ход
                result = prompt("Быки: " + answer[1] + " Коровы: " + answer[2] + " Введите число (-1 - закончить игру)", 0);


            }
        }
    }
}

function checkNumber(myresult) {
    // каждая проверка увеличивает кол-во попыток на 1
    attempts++;

    // массив результата
    // 0 - общий результат
    // 1 - быки
    // 2 - коровы
    var answer = [false, 0, 0];

    // раскладываем число на разряды
    console.log(myresult);
    console.log(number);

    /!*s = "1_2_3_4";
    mas = s.split("_")
    *!/

    var ranks = myresult.split("");//массив, полученный из введенного числа

    for (var i = 0; i < ranks.length; i++) {
        // если по индексу значения совпадают, то это бык
        if (parseInt(ranks[i]) == number[i]) {
            answer[1]++;
        }
        // если число вообще есть в массиве, то это корова
        else if (number.indexOf(parseInt(ranks[i])) != -1) {
            answer[2]++;
        }
    }

    // если набралось 4 быка, то это победа
    if (answer[1] == 4) {
        answer[0] = true;
    }

    return answer;
}

function checkAttempts() {
    // Вводим номер хода
    var numberAttempt = parseInt(prompt('Введите номер хода от 1 до ' + (allResult.length - 1)));

    // Есл введённое число входит в диапазон ходов, выводим значение из массива результатов попыток на этом ходе
    if (numberAttempt < allResult.length && numberAttempt > 0) {
        alert('Ход ' + numberAttempt + '. Вы ввели значение ' + allResult[numberAttempt])
    }
    else {
        alert('Такого хода не было!');
    }
}

