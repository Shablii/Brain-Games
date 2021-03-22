<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\getResultGame;

const GAME_CONDITION = 'Find the greatest common divisor of given numbers.';
const QUESTION = 'question';
const RIGHT_ANSWER = 'rightAnswer';

function getProgression(): array
{
    $progression = [];
    $beginProgression = 1;
    $endProgression = rand(5, 10);
    $difference = rand(1, 10);

    for ($i = $beginProgression; $i <= $endProgression; $i++) {
        $progression[] = $i * $difference;
    }

    return $progression;
}
function getTaskGameProgression(): array
{
    $progression = getProgression();

    $randomProgressionNum = rand(0, count($progression) - 1);
    $rightAnswer = $progression[$randomProgressionNum];
    $progression[$randomProgressionNum] = "..";

    $question = implode(' ', $progression);

    return [QUESTION => $question, RIGHT_ANSWER => $rightAnswer];
}

function startGame(): void
{
    $getTaskGameProgression = fn() => getTaskGameProgression();
    getResultGame($getTaskGameProgression, GAME_CONDITION);
}
