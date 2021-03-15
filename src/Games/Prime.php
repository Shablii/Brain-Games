<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\getTheResultOfTehGame;

const QUESTION_TO_THE_TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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
    $getTaskForTehGamePrime = function (): array {
        $question = rand(1, 56);
        $rightAnswer = isPime($question) ? "yes" : "no";
        return ['question' => $question, 'rightAnswer' => $rightAnswer];
    };

    getTheResultOfTehGame($getTaskForTehGamePrime, QUESTION_TO_THE_TASK);
}
