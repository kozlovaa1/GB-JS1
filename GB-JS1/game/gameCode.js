var event, ok;
var i = 0;
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
if(event == game[i].correct) {
    answerCorrect++;
}

alert('Спасибо за игру');

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