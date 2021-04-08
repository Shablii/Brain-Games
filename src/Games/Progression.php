<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\run;

use const Brain\Games\Engine\QUESTION;
use const Brain\Games\Engine\RIGHT_ANSWER;

const TASK = 'What number is missing in the progression?';

function getProgression(int $initial, int $count, int $difference): array
{
    $progression = [];
    for ($i = 0; $i <= $count; $i++) {
        $progression[] = $initial + $difference * $i;
    }
    return $progression;
}

function getTask(): array
{
    $initialProgression = rand(0, 20);
    $countProgression = rand(5, 10);
    $difference = rand(1, 10);
    $progression = getProgression($initialProgression, $countProgression, $difference);

    $randomProgressionNum = rand(0, count($progression) - 1);
    $rightAnswer = $progression[$randomProgressionNum];
    $progression[$randomProgressionNum] = "..";

    $question = implode(' ', $progression);

    return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
}

function startGame(): void
{
    run(fn() => getTask(), TASK);
}
