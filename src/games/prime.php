<?php
namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function primeGame()
{
    $getData = function () {
        $question = rand(2, 4000);
        $correctAnswer = (isPrime($question)) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    run(DESCRIPTION, $getData);
}
