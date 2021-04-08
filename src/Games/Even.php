<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\run;

use const Brain\Games\Engine\QUESTION;
use const Brain\Games\Engine\RIGHT_ANSWER;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function getTask(): array
{
    $question = rand(1, 20);
    $rightAnswer = isEven($question) ? "yes" : "no";
    return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
}

function startGame(): void
{
    run(fn() => getTask(), TASK);
}
