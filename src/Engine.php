<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\welcome;

function brainEngine(callable $getQuestion, callable $getRightAnswer, string $hello): mixed
{
    $name = welcome();
    line($hello);

    $maxMatch = 3;

    for ($i = 1; $i <= $maxMatch; $i++) {
        $question = $getQuestion();
        $rightAnswer = $getRightAnswer($question);

        $ansver = prompt("Question: {$question}");

        if ($ansver == $rightAnswer) {
            line("Correct!");
        } else {
            $wrongAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!";
            return (string) line("$wrongAnswer", $ansver, $rightAnswer, $name);
        }
    }
    return printf("Congratulations, {$name}!");
}
