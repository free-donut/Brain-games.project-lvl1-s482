<?php
namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run as run_prime;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function ifPrime($number, $divisor = 2)
{
    if ($divisor > $number / 2) {
        return true;
    } if ($number % $divisor === 0) {
        return false;
    } else {
        return ifPrime($number, $divisor + 1);
    }
}

function runGame()
{
    $getData = function () {
        $number = rand(2, 4000);
        $question = $number;
        if (ifPrime($number)) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        return ['question' => $question, 'correctAnswer' =>  $correctAnswer];
    };
    run_prime(RULES, $getData);
}
