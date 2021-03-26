<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\outcomeGame;

use const Brain\Games\Engine\QUESTION;
use const Brain\Games\Engine\RIGHT_ANSWER;

const TASK = 'Find the greatest common divisor of given numbers.';

function getProgression(int $endProgression, int $difference): array
{
    $progression = [];

    for ($i = 0; $i <= $endProgression; $i++) {
        $progression[] = ($i + 1) * $difference;
    }

    return $progression;
}

function getTaskGameProgression(): array
{
    $endProgression = rand(5, 10);
    $difference = rand(1, 10);
    $progression = getProgression($endProgression, $difference);

    $randomProgressionNum = rand(0, count($progression) - 1);
    $rightAnswer = $progression[$randomProgressionNum];
    $progression[$randomProgressionNum] = "..";

    $question = implode(' ', $progression);

    return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
}

function startGame(): void
{
    $getTaskGameProgression = fn() => getTaskGameProgression();
    outcomeGame($getTaskGameProgression, TASK);
}
