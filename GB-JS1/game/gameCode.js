var event, ok;

function startGame() {
    var money = 0;
    var answerCorrect = 0;
    var gain = 0; // выигрыш
    var hold = 0; // несгораемая сумма
    for (var i = 0; i < game.length; i++) {
        if (i > 0 && confirm('Ок - продолжить игру. Отмена - забрать деньги и закончить игру.')) {
            alert('Поздравляем! Вы выиграли ' + money + ' монет!');
            break;
        }
        do {
            ok = false;
            event = +prompt(game[i].question + game[i].answers + '-1 - Выход из игры');
            if (event == -1) {
                break;
            }
            else {
                ok = isAnswer(event);
            }
        } while (!ok);
        if (event == game[i].correct) {
            answerCorrect++;
            money = game[i].money;
            if ((i + 1) % 5 == 0) {
                hold = money;
            } else {
                break;
            }
        }
        else {
            gain = hold;
            if (gain == 0) {
                alert("Это неправильный ответ! Все ваши деньги сгорают. Игра окончена.")
            }
            else {
                alert("Это неправильный ответ! Сумма вашего выигрыша - " + gain + " монет. Игра окончена.")
            }
        }
    }

    alert('Спасибо за игру');
}


//------------------------------------------
function isAnswer(event) {
    if (isNaN(event) || !isFinite(event)) {
        alert('Вы ввели недопустимый символ');
        return false;
    }
    else if (event < 1 || event > 4) {
        alert('Ваше число выходит из допустимого диапозона');
        return false;
    }
    return true;

}