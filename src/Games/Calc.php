<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\outcomeGame;

use const Brain\Games\Engine\QUESTION;
use const Brain\Games\Engine\RIGHT_ANSWER;

const TASK = 'What is the result of the expression?';

function getTaskGameCalculator(): array
{
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
            throw new Exception("operator not found in getTaskGameCalculator");
    }
    return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
}

function startGame(): void
{
    try {
        $getTaskGameCalculator = fn() => getTaskGameCalculator();
        outcomeGame($getTaskGameCalculator, TASK);
    } catch (\Exception $e) {
        echo 'caught exception: ' . $e->getMessage();
    }
}
