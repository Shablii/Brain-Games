<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\outcomeGame;

use const Brain\Games\Engine\QUESTION;
use const Brain\Games\Engine\RIGHT_ANSWER;

const TASK = 'What number is missing in the progression?';

function getGcd(int $num1, int $num2): int
{
    while ($num1 != 0 && $num2 != 0) {
        if ($num1 > $num2) {
            $num1 = $num1 % $num2;
        } else {
            $num2 = $num2 % $num1;
        }
    }
    return $num1 + $num2;
}

function getTaskGameGcd(): array
{
    $randomNum1 = rand(1, 10);
    $randomNum2 = rand(1, 10);
    $question = "{$randomNum1} {$randomNum2}";

    $rightAnswer = getGcd($randomNum1, $randomNum2);

    return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
}

function startGame(): void
{
    $getTaskGameGcd = fn() => getTaskGameGcd();
    outcomeGame($getTaskGameGcd, TASK);
}
