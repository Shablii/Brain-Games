<?php

namespace Brain\Games\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\brainEngine;

function prime(): string
{
    $hello = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $maxMatch = 3;
    $question = [];
    $rightAnswers = [];
    $rightAnswer = '';

    for ($i = 1; $i <= $maxMatch; $i++) {
        $randomNum = rand(1, 51);

        if (in_array($randomNum, $question, true)) {
            $i--;
        }

        $question[] = $randomNum;

        if ($randomNum <= 2) {
            $rightAnswer = "yes";
        } elseif ($randomNum % 2 === 0) {
            $rightAnswer = "no";
        } else {
            for ($j = 2; $j <= round(sqrt($randomNum)); $j++) {
                if (($randomNum % $j !== 0)) {
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
    return brainEngine($result, $hello);
}
