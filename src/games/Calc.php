<?php
namespace BrainGames\Games\Calc;

use function BrainGames\Soft\run as run_calc;

function runGame()
{
    $rules = 'What is the result of the expression?';

    $dataFunc = function () {
        $arr = ['-', '+', '*'];
        $oper = rand(0, 2);
        $res = [];
        $res [] = rand(1, 10);
        $res [] = $arr[$oper];
        $res [] = rand(1, 10);
        return $res;
    };

    $questionFunc = function ($data) {
        return implode('', $data);
    };

    $correctAnswerFunc = function ($data) {
        $x = $data[0];
        $oper = $data[1];
        $y = $data[2];
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
    run_calc($rules, $dataFunc, $questionFunc, $correctAnswerFunc);
}
