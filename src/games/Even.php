<?php
namespace BrainGames\Games\Even;

use function BrainGames\Soft\run as run_even;

function runGame(){
    $rules = 'Answer "yes" if number even otherwise answer "no".';

    $dataFunc = function(){
        $res = rand(1, 100);
        return $res;
    };

    $questionFunc = function($data) {
        return $data;
    };

    $correctAnswerFunc = function($data) {
        if ($data % 2 === 0) {
            return 'yes';
        }
        return 'no';
    };

    run_even($rules, $dataFunc, $questionFunc, $correctAnswerFunc);
}
