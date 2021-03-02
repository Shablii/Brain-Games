<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\brainEngine;

function StartGame(): string
{

    $question = function (): int {
        return rand(1, 55);
    };

    function isPime(int $question): bool
    {
        if ($question <= 1) {
            return false;
        } else {
            for ($i = 2; $i <= round(sqrt($question)); $i++) {
                if (($question % $i === 0)) {
                    return false;
                }
            }
        }
        return true;
    }

    $rightAnswer = fn($question) => isPime($question) ? "yes" : "no";

    $hello = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    return brainEngine($question, $rightAnswer, $hello);
}
