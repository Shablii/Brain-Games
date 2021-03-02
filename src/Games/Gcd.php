<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\brainEngine;

function StartGame(): string
{
    $question = function (): string {
        $randomNum1 = rand(1, 10);
        $randomNum2 = rand(1, 10);
        $question = "{$randomNum1} {$randomNum2}";
        return $question;
    };

    $rightAnsver = function (string $question): int {
        $rightAnswer = 0;
        [$num1, $num2] = explode(" ", $question);
        $minNum = ($num1 >= $num2) ? (int) $num2 : (int) $num1 ;
        while ($minNum >= 1) {
            if ($num1 % $minNum === 0 && $num2 % $minNum === 0) {
                $rightAnswer = $minNum;
                break;
            }
            $minNum--;
        }
        return $rightAnswer;
    };

    $hello = 'Find the greatest common divisor of given numbers.';

    return brainEngine($question, $rightAnsver, $hello);
}
