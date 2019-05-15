<?php
namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run as run_prime;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function ifPrime($number, $x = 2)
{
    if($x > $number/2){
      return true;
    } if($number % $x === 0) {
        return false;
    } else {
        return ifPrime($number, $x +1);
    }
}

function runGame()
{
    $getData = function () {
        $number =rand(2, 4000);
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
