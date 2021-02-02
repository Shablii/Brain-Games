<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\welcome;

function brainEngine($hello)
{
    $name = welcome();
    $maxMatch = 3;

    line($hello);

    for ($i = 1; $i <= $maxMatch; $i++) {
        $question = question();
        $rightAnswer = rightAnsver($question);
        $ansver = prompt("Question: {$question}");

        if ($ansver == $rightAnswer) {
            line("Correct!");
        } else {
            $wronAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s";
            return line("$wronAnswer", $ansver, $rightAnswer, $name);
        }
    }
    return line("Congratulations, {$name}!");
}
