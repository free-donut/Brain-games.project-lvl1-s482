<?php
namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run as run_progression;

const RULES = 'What number is missing in the progression?';

function progression ()
{
    $arr = [];
    $step = rand(1, 10);
    $first = rand(1, 10);
    $arr [] = $first;
    for($i = 0; $i < 9; $i++) {
        $arr[] = $arr[$i] + $step;
  }
    return $arr;
}

function runGame ()
{
    $getData = function () {
        $progression = progression();
        $index = rand(0, 9);
        $correctAnswer = $progression[$index];
        $progression[$index] = '..';
        $question = implode(' ', $progression);
        return ['question' => $question, 'correctAnswer' =>  $correctAnswer];
    };
    run_progression(RULES, $getData);
}
