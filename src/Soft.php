<?php

namespace BrainGames\Soft;

use function \cli\line;

//приветсивие, узнать имя
function run($rules, $dataFunc, $questionFunc, $correctAnswerFunc)
{
//приветствие
    line('Welcome to the Brain Game!');
//правила
    line($rules);
    //узнать имя
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
//вопросы
    for ($correctAnswerCount = 0; $correctAnswerCount < 3; $correctAnswerCount++) {
        $data = $dataFunc();
        $question = $questionFunc($data);
        $correctAnswer = $correctAnswerFunc($data);
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
    if ($correctAnswerCount == 3) {
        line('Congratulations, %s', $name);
    }
}

/*
//вопрос
function question($func)
{
    return $func;
}

//правильный ответ
function correectAnswer($question, $func)
{
    return $func($question);
}
*/
