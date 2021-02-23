<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\brainEngine;

function StartGame(): string
{
    $question = fn() => rand(1, 20);

    $rightAnswer = fn($question) => ($question % 2 !== 0) ? "no" : "yes";

    $hello = 'Answer "yes" if the number is even, otherwise answer "no".';

    return brainEngine($question, $rightAnswer, $hello);
}
