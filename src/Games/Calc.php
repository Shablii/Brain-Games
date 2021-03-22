<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\getResultGame;

const GAME_CONDITION = 'What is the result of the expression?';
const QUESTION = 'question';
const RIGHT_ANSWER = 'rightAnswer';

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
    }
    return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
}

function startGame(): void
{
    $getTaskGameCalculator = fn() => getTaskGameCalculator();
    getResultGame($getTaskGameCalculator, GAME_CONDITION);
}
