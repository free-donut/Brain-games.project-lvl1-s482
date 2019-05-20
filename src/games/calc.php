<?php
namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run as runCalc;

const DESCRIPTION = 'What is the result of the expression?';

function getExpression()
{
        $operands = ['-', '+', '*'];
        $arrayLength = count($operands);
        $operand = rand(0, $arrayLength - 1);
        $result = [];
        $result [] = rand(1, 10);
        $result [] = $operands[$operand];
        $result [] = rand(1, 10);
        return $result;
}

function getResultExpression($firstNumber, $operand, $secondNumber)
{
    switch ($operand) {
        case '+':
            return $firstNumber + $secondNumber;
            break;
        case '-':
            return $firstNumber - $secondNumber;
            break;
        case '*':
            return $firstNumber * $secondNumber;
            break;
    }
}

function runGame()
{
    $getData = function () {
        $expression = getExpression();
        $question = implode(' ', $expression);
        [$firstNumber, $operand, $secondNumber] = $expression;
        $correctAnswer = getResultExpression($firstNumber, $operand, $secondNumber);
        return [$question, $correctAnswer];
    };
    runCalc(DESCRIPTION, $getData);
}
