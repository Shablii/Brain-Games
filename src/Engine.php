<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\welcome;

function brainEngine(array $result, string $hello): mixed
{
    $name = welcome();
    line($hello);

    foreach ($result as $question => $rightAnswer) {
        $ansver = prompt("Question: {$question}");

        if ($ansver == $rightAnswer) {
            line("Correct!");
        } else {
            $wrongAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!";
            return (string) line("$wrongAnswer", $ansver, $rightAnswer, $name);
        }
    }
    return line("Congratulations, {$name}!");
}
