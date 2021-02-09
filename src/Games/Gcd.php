<?php

namespace Brain\Games\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\brainEngine;

function gcd(): string
{
    $hello = 'Find the greatest common divisor of given numbers.';
    $maxMatch = 3;
    $question = [];
    $rightAnswer = [];

    for ($i = 1; $i <= $maxMatch; $i++) {
        $randomNum1 = rand(1, 10);
        $randomNum2 = rand(1, 10);
        if (in_array("{$randomNum1} {$randomNum2}", $question)) {
            $randomNum2 += $randomNum1;
        }

        $question[] = "{$randomNum1} {$randomNum2}";

        $minNum = ($randomNum1 >= $randomNum2) ? $randomNum2 : $randomNum1 ;
        while ($minNum >= 1) {
            if (!($randomNum1 % $minNum) && !(($randomNum2 % $minNum))) {
                $rightAnswer[] = $minNum;
                break;
            }
            $minNum--;
        }
    }
    $result = array_combine($question, $rightAnswer);
    return brainEngine($result, $hello);
}
