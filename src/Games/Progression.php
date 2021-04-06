<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\run;

use const Brain\Games\Engine\QUESTION;
use const Brain\Games\Engine\RIGHT_ANSWER;

const TASK = 'What number is missing in the progression?';

function getProgression(int $initialProgression, int $countProgression, int $difference): array
{
    $progression = [];
    for ($i = 0; $i <= $countProgression; $i++) {
        $progression[] = $initialProgression + $difference * $i;
    }
    return $progression;
}

function getGameTask(): array
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
    run(fn() => getGameTask(), TASK);
}
