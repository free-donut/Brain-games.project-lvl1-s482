<?php

namespace BrainGames\Cli;

use function \cli\line;

function run()
{
    line('Welcome to the Brain Game!');
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
}

function ifEven($number)
{
    if ($number % 2 === 0) {
        return 'yes';
    }
    return 'no';
}

function questionEven($name)
{
    for ($correctAnswerCount = 0; $correctAnswerCount < 3; $correctAnswerCount++) {
        $num = rand(1, 100);
        line('Question: %s', $num);
        $answer = \cli\prompt('Your answer');
        $correectAnswer = ifEven($num);
        if ($answer == $correectAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(.', $answer);
            line('Correct answer was \'%s\'', $correectAnswer);
            line("Let's try again, %s", $name);
            break;
        }
    }
    if ($correctAnswerCount == 3) {
        line('Congratulations, %s', $name);
    }
}

function runEven()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
    questionEven($name);
}
