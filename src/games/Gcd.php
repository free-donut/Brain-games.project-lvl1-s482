<?php
namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run as run_gcd;

const RULES = 'Find the greatest common divisor of given numbers.';

function maxDivisor($numbers)
{
    $firstNumber = $numbers[0];
    $secondNumber = $numbers[1];
    if ($firstNumber === $secondNumber) {
        return $firstNumber;
    }
    for ($i = max($firstNumber, $secondNumber); $i > 0; $i--) {
        if ($firstNumber % $i === 0 && $secondNumber % $i === 0) {
            return $i;
        }
    }
}

function getNumbers()
{
    $numbers = [];
    $numbers [] = rand(1, 100);
    $numbers [] = rand(1, 100);
    return $numbers;
}

function runGame()
{
    $getData = function () {
        $numbers = getNumbers();
        $correctAnswer = maxDivisor($numbers);
        $question = implode(' ', $numbers);
        return ['question' => $question, 'correctAnswer' =>  $correctAnswer];
    };
    run_gcd(RULES, $getData);
}
