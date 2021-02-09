<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\welcome;

function brainEngine(array $result, string $hello): string
{
    $name = welcome();
    line($hello);

    foreach ($result as $question => $rightAnswer) {
        $ansver = prompt("Question: {$question}");

        if ($ansver == $rightAnswer) {
            line("Correct!");
        } else {
            $wronAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!";
            return (string) line("$wronAnswer", $ansver, $rightAnswer, $name);
        }
    }
    $tipe = printf("Congratulations, {$name}!");
    //var_dump($tipe);
    return $tipe;
}
