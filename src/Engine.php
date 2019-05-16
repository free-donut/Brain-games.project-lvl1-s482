<?php
namespace BrainGames\Engine;

use function \cli\line;

const RIGHT_ANSWERS_FOR_WINNING = 3;

function run($rules, $getData)
{
    line('Welcome to the Brain Game!');
    line($rules);
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($round = 0; $round < RIGHT_ANSWERS_FOR_WINNING; $round++) {
        $gameData = $getData();
        $question = $gameData['question'];
        $correctAnswer = $gameData['correctAnswer'];
        line('Question: %s', $question);
        $answer = \cli\prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(.', $answer);
            line('Correct answer was \'%s\'', $correctAnswer);
            line("Let's try again, %s", $name);
            break;
        }
    }
    if ($round === RIGHT_ANSWERS_FOR_WINNING) {
        line('Congratulations, %s', $name);
    }
}
