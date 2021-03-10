<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\getResultGame;

const QUESTION_FOR_TASK = 'What is the result of the expression?';

function startGame(): string
{
    $getTaskGameCalculator = function (): array {
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
                return "error";
        }
        return ['question' => $question, 'rightAnswer' => $rightAnswer];
    };

    return getResultGame($getTaskGameCalculator, QUESTION_FOR_TASK);
}
