<?php
namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run as runPrime;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number, $divisor = 2)
{
    if ($divisor > $number / 2) {
        return true;
    } if ($number % $divisor === 0) {
        return false;
    } else {
        return isPrime($number, $divisor + 1);
    }
}

function runGame()
{
    $getData = function () {
        $number = rand(2, 4000);
        $question = $number;
        if (isPrime($number)) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        return [$question, $correctAnswer];
    };
    runPrime(DESCRIPTION, $getData);
}
