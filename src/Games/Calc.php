<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\getTheResultOfTehGame;

const QUESTION_TO_THE_TASK = 'What is the result of the expression?';

function startGame(): void
{
    $getTaskForTehGameCalculator = function (): array | string {
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
                return "there is no way to count the expression";
        }
        return ['question' => $question, 'rightAnswer' => $rightAnswer];
    };

    getTheResultOfTehGame($getTaskForTehGameCalculator, QUESTION_TO_THE_TASK);
}
