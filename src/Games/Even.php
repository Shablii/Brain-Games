<?php

namespace Brain\Games\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\brainEngine;

function even(): string
{
    $hello = 'Answer "yes" if the number is even, otherwise answer "no".';
    $maxMatch = 3;
    $question = [];
    $rightAnswer = [];

    for ($i = 1; $i <= $maxMatch; $i++) {
        $randomNum1 = rand(1, 20);
        $randomNum2 = rand(1, 5);
        if (in_array($randomNum1, $question, true)) {
            $randomNum1 += $randomNum2;
        }
        $question[] = $randomNum1;
        if ($randomNum1 % 2 !== 0) {
            $rightAnswer[] = "no";
        } else {
            $rightAnswer[] = "yes";
        }
    }

    $result = array_combine($question, $rightAnswer);
     return brainEngine($result, $hello);
}
