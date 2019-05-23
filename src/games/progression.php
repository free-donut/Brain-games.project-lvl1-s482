<?php
namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function getProgression($progressionLength, $start, $diff)
{
    for ($i = 0; $i < $progressionLength; $i++) {
        $result[] = $start + $diff * $i;
    }
    return $result;
}

function progressionGame()
{
    $getData = function () {
        $progressionStart = rand(1, 10);
        $progressionDiff = rand(1, 10);    
        $progression = getProgression(PROGRESSION_LENGTH, $progressionStart, $progressionDiff);
        $hiddenElementIndex = rand(0, PROGRESSION_LENGTH - 1);
        $correctAnswer = $progression[$hiddenElementIndex];
        $progression[$hiddenElementIndex] = '..';
        $question = implode(' ', $progression);
        return [$question, $correctAnswer];
    };
    run(DESCRIPTION, $getData);
}
