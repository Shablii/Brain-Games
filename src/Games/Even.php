<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\getResultGame;

const GAME_CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';
const QUESTION = 'question';
const RIGHT_ANSWER = 'rightAnswer';

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function startGame(): void
{
    $getTaskGameEven = function (): array {
        $question = rand(1, 20);
        $rightAnswer = isEven($question) ? "yes" : "no";
        return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
    };

    getResultGame($getTaskGameEven, GAME_CONDITION);
}
