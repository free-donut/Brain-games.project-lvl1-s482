<?php
namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const DESCRIPTION = 'What is the result of the expression?';
const OPERANDS = ['-', '+', '*'];

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

function calcGame()
{
    $getData = function () {
    	$firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
    	$operandIndex = rand(0, count(OPERANDS) - 1);
        $operand = OPERANDS[$operandIndex];
        $question = "$firstNumber $operand $secondNumber";
        $correctAnswer = getResultExpression($firstNumber, $operand, $secondNumber);
        return [$question, $correctAnswer];
    };
    run(DESCRIPTION, $getData);
}
