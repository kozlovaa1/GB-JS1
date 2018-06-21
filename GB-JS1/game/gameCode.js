var event, ok;

function startGame() {
    var money = 0;
    var hold = 0; // несгораемая сумма
    var event = 0;
    for (var i = 0; i < game.length; i++) {
        if (i > 0 && !confirm('Вы можете забрать деньги и закончить игру. Продолжаем игру?')) {
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
            money = game[i].money;
            alert('Верный ответ! Вы зарабатываете ' + money + ' монет.');
            if ((i + 1) % 5 == 0) {
                hold = money;
            }
            if (i == game.length - 1) {
                alert('Поздравляем! Вы - миллионер!');
            }
        }
        else {
            if (hold == 0) {
                alert("Это неправильный ответ! Все ваши деньги сгорают.");
                break;
            }
            else {
                alert("Это неправильный ответ! Сумма вашего выигрыша - " + hold + " монет.");
                break;
            }
        }
    }
    alert('Игра окончена.')
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