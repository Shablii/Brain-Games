<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\run;

use const Brain\Games\Engine\QUESTION;
use const Brain\Games\Engine\RIGHT_ANSWER;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPime(int $num): bool
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= round(sqrt($num)); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function getTask(): array
{
    $question = rand(1, 42);
    $rightAnswer = isPime($question) ? "yes" : "no";
    return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
}

function startGame(): void
{
    run(fn() => getTask(), TASK);
}
