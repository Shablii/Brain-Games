<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\getResultGame;

function startGame(): string
{
    $getTaskGameCalculator = function () {
        $randomNum1 = rand(5, 10);
        $randomNum2 = rand(1, 5);
        $operators = ["+", "*", "-"];
        $operator = $operators[rand(0, 2)];
        $question = "{$randomNum1} {$operator} {$randomNum2}";

        $rightAnswer = '';
        switch ($operator) {
            case "+":
                $rightAnswer = $randomNum1 + $randomNum2;
                break;
            case "*":
                $rightAnswer = $randomNum1 * $randomNum2;
                break;
            case "-":
                $rightAnswer = $randomNum1 - $randomNum2;
                break;
            default:
                null;
        }
        return ['question' => $question, 'rightAnswer' => $rightAnswer];
    };

    $questionForTask = 'What is the result of the expression?';

    return getResultGame($getTaskGameCalculator, $questionForTask);
}
