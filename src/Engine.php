<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\welcome;

const RAUND = 2;

function getResultGame(callable $getTaskGames, string $questionForTask): string
{
    $name = welcome();
    line($questionForTask);

    for ($i = 0; $i <= RAUND; $i++) {
        $task = $getTaskGames();

        $answer = prompt("Question: {$task['question']}");

        if ($answer == $task['rightAnswer']) {
            line("Correct!");
        } else {
            $wrongAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!";
            return (string) line("$wrongAnswer", $answer, $task['rightAnswer'], $name);
        }
    }
    return (string) line("Congratulations, {$name}!");
}
