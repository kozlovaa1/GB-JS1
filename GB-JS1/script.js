//1) С помощью цикла whcountle вывести все простые числа в промежутке от 0 до 100
var count = 0;
while (count++ < 100) {
    if (count > 10) {
        if (count % 2 == 0 || count % 10 == 5) {
            continue;
        }
    }
    var i = 1;
    while (i++ < count) {
        if ((i * i - 1) > count) {
            console.log(count);
            break;
        }
        if (count % i == 0) {
            break;
        }

    }
}
/*2) С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
    0 – это ноль
1 – нечетное число
2 – четное число
3 – нечетное число
…
10 – четное число*/
count = 0
do {
    if (count == 0) {
        console.log(count + ' - это ноль');
    }
    else if (count % 2 == 0) {
        console.log(count + ' - четное число');
    }
    else {
        console.log(count + ' - нечетное число');
    }
    count++;
} while (count <= 10);

/*3) * Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. То есть выглядеть должно вот так:

    for(…){// здесь пусто}*/
for (count = 0; count <= 9; console.log(count++)) {
}

/*4) * Нарисовать пирамиду с помощью console.log, как показано на рисунке, только у вашей пирамиды должно быть 20 рядов, а не 5:

x
xx
xxx
xxxx
xxxxx*/
var row = 'x';
for (count = 0; count < 20; count++) {
    console.log(row);
    row = 'x' + row;
}