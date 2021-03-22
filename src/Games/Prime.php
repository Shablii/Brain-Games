<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\getResultGame;

const GAME_CONDITION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const QUESTION = 'question';
const RIGHT_ANSWER = 'rightAnswer';

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

function startGame(): void
{
    $getTaskGamePrime = function (): array {
        $question = rand(1, 42);
        $rightAnswer = isPime($question) ? "yes" : "no";
        return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
    };

    getResultGame($getTaskGamePrime, GAME_CONDITION);
}
