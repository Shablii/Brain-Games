<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\welcome;

function brainEngine($result, $hello)
{
    $name = welcome();
    line($hello);

    foreach ($result as $question => $rightAnswer) {
        $ansver = prompt("Question: {$question}");

        if ($ansver == $rightAnswer) {
            line("Correct!");
        } else {
            $wronAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!";
            return line("$wronAnswer", $ansver, $rightAnswer, $name);
        }
    }
    return line("Congratulations, {$name}!");
}
