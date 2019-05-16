<?php
namespace BrainGames\Engine;

use function \cli\line;

const RIGHT_ANSWERS_FOR_WINNING = 3;

//приветсивие, узнать имя
function run($rules, $getData)
{
//приветствие
    line('Welcome to the Brain Game!');
//правила
    line($rules);
//узнать имя
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
//вопросы
    for ($rightAnswerCount = 0; $rightAnswerCount < RIGHT_ANSWERS_FOR_WINNING; $rightAnswerCount++) {
        $gameData = $getData();
        $question = $gameData['question'];
        $correctAnswer = $gameData['correctAnswer'];
        line('Question: %s', $question);
        $answer = \cli\prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(.', $answer);
            line('Correct answer was \'%s\'', $correctAnswer);
            line("Let's try again, %s", $name);
            break;
        }
    }
    if ($rightAnswerCount == RIGHT_ANSWERS_FOR_WINNING) {
        line('Congratulations, %s', $name);
    }
}
