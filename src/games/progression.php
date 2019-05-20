<?php
namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run as runProgression;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function getProgression($progressionLength)
{
    $diff = rand(1, 10);
    $start = rand(1, 10);
    for ($i = 0; $i < $progressionLength; $i++) {
        $result[] = $start + $diff * $i;
    }
    return $result;
}

function runGame()
{
    $getData = function () {
        $progression = getProgression(PROGRESSION_LENGTH);
        $hiddenElementIndex = rand(0, PROGRESSION_LENGTH - 1);
        $correctAnswer = $progression[$hiddenElementIndex];
        $progression[$hiddenElementIndex] = '..';
        $question = implode(' ', $progression);
        return [$question, $correctAnswer];
    };
    runProgression(DESCRIPTION, $getData);
}
