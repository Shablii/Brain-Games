<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUND = 2;

function getTheResultOfTehGame(callable $getTaskForTehGame, string $questionToTheTask): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($questionToTheTask);

    for ($i = 0; $i <= ROUND; $i++) {
        [
            'question' => $question,
            'rightAnswer' => $rightAnswer
        ] = $getTaskForTehGame();

        $answer = prompt("Question: $question");

        if ($answer == $rightAnswer) {
            line("Correct!");
            if ($i === ROUND) {
                line("Congratulations, {$name}!");
            }
        } else {
            $wrongAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!";
            line("$wrongAnswer", $answer, $rightAnswer, $name);
            break;
        }
    }
}
