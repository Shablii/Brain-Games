<?php

namespace Brain\Games\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\brainEngine;

function progression(): string
{
    $hello = 'Find the greatest common divisor of given numbers.';
    $maxMatch = 3;
    $rightAnswer = [];

    $questions = [];
    for ($j = 1; $j <= $maxMatch; $j++) {
        $randomNum1 = rand(1, 10);
        $randomNum2 = rand(5, 10);

        $question = [];
        for ($i = $randomNum1; $i < ($randomNum1 + $randomNum2); $i++) {
            $question[] = $i * $randomNum2;
        }

        $randomProgressionNum = rand(0, count($question) - 1);
        $rightAnswer[] = $question[$randomProgressionNum];

        $question[$randomProgressionNum] = "..";

        $questions[] = implode(" ", $question);
        //unset($question);
    }
    $result = array_combine($questions, $rightAnswer);
    return brainEngine($result, $hello);
}
