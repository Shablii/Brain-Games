<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_LIMIT = 3;
const QUESTION = 'question';
const RIGHT_ANSWER = 'rightAnswer';

function outcomeGame(callable $getTaskGame, string $task): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($task);

    for ($i = 0; $i < ROUNDS_LIMIT; $i++) {
        [
            QUESTION => $question,
            RIGHT_ANSWER => $rightAnswer
        ] = $getTaskGame();

        $answer = prompt("Question: $question");

        if ($answer == $rightAnswer) {
            line("Correct!");
        } else {
            $mistakeMessage = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!";
            line($mistakeMessage, $answer, $rightAnswer, $name);
            return;
        }
    }
    line("Congratulations, {$name}!");
}
