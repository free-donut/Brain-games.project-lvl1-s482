<?php
namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run as run_calc;

const RULES = 'What is the result of the expression?';

function getExpression () 
{
        $arr = ['-', '+', '*'];
        $oper = rand(0, 2);
        $res = [];
        $res [] = rand(1, 10);
        $res [] = $arr[$oper];
        $res [] = rand(1, 10);
        return $res;
}

function resultExpression ($expression)
{
        $x = $expression[0];
        $oper = $expression[1];
        $y = $expression[2];
        switch ($oper) {
            case '+':
                return $x + $y;
                break;
            case '-':
                return $x - $y;
                break;
            case '*':
                return $x * $y;
                break;
        }
};

function runGame ()
{
    $getData = function () {
        $expression = getExpression();
        $question = implode(' ', $expression);
        $correctAnswer = resultExpression($expression);
        return ['question' => $question, 'correctAnswer' =>  $correctAnswer];
    };
    run_calc(RULES, $getData);
}
