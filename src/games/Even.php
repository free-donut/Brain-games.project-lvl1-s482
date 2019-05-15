<?php
namespace BrainGames\Games\Even;

use function BrainGames\Engine\run as run_even;

const RULES = 'Answer "yes" if number even otherwise answer "no".';

function ifEven($number) 
{
    return $number % 2 === 0;
}

function runGame()
{
    $getData = function () {
        $question = rand(1, 100);
        if (ifEven($question)) {
            $correctAnswer = 'yes';
        }else {
            $correctAnswer = 'no';
        }
        return ['question' => $question, 'correctAnswer' =>  $correctAnswer];
    };
    run_even(RULES, $getData);
}
