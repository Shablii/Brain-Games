<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\brainEngine;

function StartGame(): string
{
    $question = function () {
        $randomNum1 = rand(5, 10);
        $randomNum2 = rand(1, 5);
        $operators = ["+", "*", "-"];
        $operator = $operators[rand(0, 2)];
        $question = "{$randomNum1} {$operator} {$randomNum2}";
        return (string) $question;
    };

    $rightAnswer = function ($question) {
        $answer = explode(' ', $question);
        $rightAnswer = '';
        switch ($answer[1]) {
            case "+":
                $rightAnswer = (int) $answer[0] +  (int) $answer[2];
                break;
            case "*":
                $rightAnswer = (int) $answer[0] * (int) $answer[2];
                break;
            case "-":
                $rightAnswer = (int) $answer[0] - (int) $answer[2];
                break;
        }
        return $rightAnswer;
    };

    $hello = 'What is the result of the expression?';

    return brainEngine($question, $rightAnswer, $hello);
}
