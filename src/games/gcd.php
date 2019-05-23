<?php
namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function findMaxDivisor($firstNumber, $secondNumber)
{
    if ($firstNumber === $secondNumber) {
        return $firstNumber;
    }
    for ($i = max($firstNumber, $secondNumber); $i > 0; $i--) {
        if ($firstNumber % $i === 0 && $secondNumber % $i === 0) {
            return $i;
        }
    }
}

function gcdGame()
{
    $getData = function () {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $correctAnswer = findMaxDivisor($firstNumber, $secondNumber);
        $question = "$firstNumber $secondNumber";
        return [$question, $correctAnswer];
    };
    run(DESCRIPTION, $getData);
}
