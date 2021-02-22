<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\brainEngine;

function StartGame()
{
    $question = function () {
        $randomNum1 = rand(5, 10);
        $randomNum2 = rand(1, 5);
        $symbols = ["+", "*", "-"];
        $symbol = $symbols[rand(0, 2)];
        $question = "{$randomNum1} {$symbol} {$randomNum2}";
        return $question;
    };

    $rightAnswer = function ($question) {
        $Answer = explode(' ', $question);
        $RightAnswer = '';
        switch ($Answer[1]) {
            case "+":
                $RightAnswer = (int) $Answer[0] +  (int) $Answer[2];
                break;
            case "*":
                $RightAnswer = (int) $Answer[0] * (int) $Answer[2];
                break;
            case "-":
                $RightAnswer = (int) $Answer[0] - (int) $Answer[2];
                break;
        }
        return $RightAnswer;
    };

    $hello = 'What is the result of the expression?';

    return brainEngine($question, $rightAnswer, $hello);
}
