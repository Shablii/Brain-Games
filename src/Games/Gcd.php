<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\getResultGame;

function StartGame(): string
{
    $getTaskGameGcd = function () {
        $randomNum1 = rand(1, 10);
        $randomNum2 = rand(1, 10);
        $question = "{$randomNum1} {$randomNum2}";

        $rightAnswer = 0;
        $minNum = ($randomNum1 >= $randomNum2) ? $randomNum2 : $randomNum1;
        while ($minNum >= 1) {
            $divideWithoutRemainder = $randomNum1 % $minNum === 0 && $randomNum2 % $minNum === 0;
            if ($divideWithoutRemainder) {
                $rightAnswer = $minNum;
                break;
            }
            $minNum--;
        }

        return ['question' => $question, 'rightAnswer' => $rightAnswer];
    };

    $questionForTask = 'Find the greatest common divisor of given numbers.';

    return getResultGame($getTaskGameGcd, $questionForTask);
}
