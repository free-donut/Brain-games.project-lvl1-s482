<?php
namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run as run_gcd;

const RULES = 'Find the greatest common divisor of given numbers.';

function maxDivisor ($numbers)
{
    $x = $numbers[0];
    $y = $numbers[1];
    if ($x === $y) {
        return $x;
    } else {
        for ($i = max($x, $y); $i > 0; $i--) {
            if ($y % $i === 0 && $x % $i === 0) {
                return $i;
            }
        }
    }
}

function getNumbers () {
        $res = [];
        $res [] = rand(1, 100);
        $res [] = rand(1, 100);
        return $res;
}

function runGame ()
{
    $getData = function () {
    	$numbers = getNumbers();
        $question = implode(' ', $numbers);
        $correctAnswer = maxDivisor($numbers);
        return ['question' => $question, 'correctAnswer' =>  $correctAnswer];
    };
    run_gcd(RULES, $getData);
}