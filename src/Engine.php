<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_LIMIT = 3;
const QUESTION = 'question';
const RIGHT_ANSWER = 'rightAnswer';

function getResultGame(callable $TaskGame, string $gameCondition): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($gameCondition);

    for ($i = 0; $i < ROUNDS_LIMIT; $i++) {
        [
            QUESTION => $question,
            RIGHT_ANSWER => $rightAnswer
        ] = $TaskGame();

        $answer = prompt("Question: $question");

        if ($answer == $rightAnswer) {
            line("Correct!");
        } else {
            $textForWrongAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!";
            die(line("$textForWrongAnswer", $answer, $rightAnswer, $name));
        }
    }
    die(line("Congratulations, {$name}!"));
}
