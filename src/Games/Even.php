<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\getTheResultOfTehGame;

const QUESTION_TO_THE_TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return ($num % 2 !== 0) ? false : true;
}

function startGame(): void
{
    $getTaskForTehGameEven = function (): array {
        $question = rand(1, 20);
        $rightAnswer = isEven($question) ? "yes" : "no";
        return ['question' => $question, 'rightAnswer' => $rightAnswer];
    };

    getTheResultOfTehGame($getTaskForTehGameEven, QUESTION_TO_THE_TASK);
}
