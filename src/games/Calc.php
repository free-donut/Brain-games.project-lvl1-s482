#!/usr/bin/env php
<?php
$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

$rules = 'What is the result of the expression?';

$dataFunc = function(){
  $arr = ['-', '+', '*'];
  $oper = rand(0,2);
  $res = [];
  $res [] = rand(1, 10);
  $res [] = $arr[$oper];
  $res []= rand(1, 10);
  return $res;
};

$questionFunc = function($data) {
  return implode('' , $data);
};

$correctAnswerFunc = function($data) {
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

BrainGames\Soft\run($rules, $dataFunc, $questionFunc, $correctAnswerFunc);
