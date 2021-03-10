<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\getResultGame;

function isEven(int $num): bool
{
    return ($num % 2 !== 0) ? false : true;
}

function startGame(): string
{
    $getTaskGameEven = function (): array {
        $question = rand(1, 20);

        $rightAnswer = isEven($question) ? "yes" : "no";

        return ['question' => $question, 'rightAnswer' => $rightAnswer];
    };

    $questionForTask = 'Answer "yes" if the number is even, otherwise answer "no".';

    return getResultGame($getTaskGameEven, $questionForTask);
}
