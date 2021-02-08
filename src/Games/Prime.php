<?php

namespace Brain\Games\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\brainEngine;

function prime()
{
    $hello = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $maxMatch = 3;
    $question = [];
    $rightAnswer = [];
    for ($i = 1; $i <= $maxMatch; $i++) {
        $question[] = rand(1, 50);
        $rightAnswer[] = (gmp_prob_prime($question[$i - 1])) ? "yes" : "no";
    }
    $result = array_combine($question, $rightAnswer);
    brainEngine($result, $hello);
}
