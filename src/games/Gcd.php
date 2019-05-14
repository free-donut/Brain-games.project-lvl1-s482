<?php
namespace BrainGames\Games\Gcd;

use function BrainGames\Soft\run as run_gcd;

function maxDivisor($x, $y){
    if ($x === $y) {
        return $x;
    } else {
        for ($i = max($x, $y); $i > 0 ; $i--) { 
            if($y % $i === 0 && $x % $i === 0 ) {
                return $i;
            }
        }
    }
}
function runGame(){
    $rules = 'Find the greatest common divisor of given numbers.';

    $dataFunc = function(){
        $res =[];
        $res [] = rand(1, 100);
        $res [] = rand(1, 100);
        return $res;
    };

    $questionFunc = function($data) {
        $res = implode(' ', $data);
        return $res;
    };

    $correctAnswerFunc = function($data) {
        $x = $data[0];
        $y = $data[1];        
        return maxDivisor($x, $y);
    };

    run_gcd($rules, $dataFunc, $questionFunc, $correctAnswerFunc);
}
