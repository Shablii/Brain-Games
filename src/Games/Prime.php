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
        $randomNum = rand(1, 50);
        $question[] = $randomNum;

        if ($randomNum <= 2) {
            $rightAnswer = "yes";
        } else {
            for ($x = 2; $x <= round(sqrt($randomNum)); $x++) {
                if (($randomNum % $x)) {
                    $rightAnswer = "yes";
                } else {
                    $rightAnswer = "no";
                    break;
                }
            }
        }
        $rightAnswers[] = $rightAnswer;
    }
    $result = array_combine($question, $rightAnswers);
    brainEngine($result, $hello);
}
