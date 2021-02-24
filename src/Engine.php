<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\welcome;

function brainEngine(callable $getQuestion, callable $getRightAnswer, string $hello): string
{
    $name = welcome();
    line($hello);

    define("RAUND", 2);

    for ($i = 0; $i <= RAUND; $i++) {
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
    return (string) printf("Congratulations, {$name}!");
}
