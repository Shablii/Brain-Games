<?php

namespace Brain\Games\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\brainEngine;

function even()
{
    $hello = 'Answer "yes" if the number is even, otherwise answer "no".';
    $maxMatch = 3;
    $question = [];
    $rightAnswer = [];

    for ($i = 1; $i <= $maxMatch; $i++) {
        $randomNum = rand(1, 20);
        $question[] = $randomNum;
        $rightAnswer[] = ($randomNum % 2) ? "no" : "yes";
    }

    $result = array_combine($question, $rightAnswer);
    brainEngine($result, $hello);
}
