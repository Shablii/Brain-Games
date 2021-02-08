<?php

namespace Brain\Games\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\brainEngine;

function calc()
{
    $hello = 'What is the result of the expression?';

    $maxMatch = 3;
    $question = [];
    $rightAnswer = [];

    for ($i = 1; $i <= $maxMatch; $i++) {
        $randomNum1 = rand(5, 10);
        $randomNum2 = rand(1, 5);
        $symbols = ["+", "*", "-"];
        $symbol = $symbols[rand(0, 2)];
        $question = "{$randomNum1} {$symbol} {$randomNum2}";
        $questions[] = $question;

        eval('$rightAnswer[] = ' . $question . ';');
    }
    $result = array_combine($questions, $rightAnswer);
    brainEngine($result, $hello);
}
