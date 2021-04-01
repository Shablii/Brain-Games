<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\run;

use const Brain\Games\Engine\QUESTION;
use const Brain\Games\Engine\RIGHT_ANSWER;

const TASK = 'What is the result of the expression?';
const OPERATORS = ["+", "*", "-"];

function calculate(int $num1, string $operator, int $num2): int
{
    switch ($operator) {
        case "+":
            return $num1 + $num2;
        case "*":
            return $num1 * $num2;
        case "-":
            return $num1 - $num2;
        default:
            throw new \Exception("operator $operator not found in the getGameTask function");
    }
}

function getGameTask(): array
{
    $randomNum1 = rand(5, 10);
    $randomNum2 = rand(1, 5);
    $operator = OPERATORS[array_rand(OPERATORS)];

    $question = "{$randomNum1} {$operator} {$randomNum2}";

    $rightAnswer = calculate($randomNum1, $operator, $randomNum2);
    return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
}

function startGame(): void
{
    run(fn() => getGameTask(), TASK);
}
