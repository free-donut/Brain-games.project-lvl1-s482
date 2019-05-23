<?php
namespace BrainGames\Games\Even;

use function BrainGames\Engine\run;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function isEven($number)
{
    return $number % 2 === 0;
}

function evenGame()
{
    $getData = function () {
        $question = rand(1, 100);
        $correctAnswer = (isEven($question)) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    run(DESCRIPTION, $getData);
}
