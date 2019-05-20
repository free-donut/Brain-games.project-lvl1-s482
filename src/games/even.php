<?php
namespace BrainGames\Games\Even;

use function BrainGames\Engine\run as runEven;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function isEven($number)
{
    return $number % 2 === 0;
}

function runGame()
{
    $getData = function () {
        $question = rand(1, 100);
        $correctAnswer = (isEven($question)) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    runEven(DESCRIPTION, $getData);
}
