<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\getResultGame;

const QUESTION_FOR_TASK = 'Find the greatest common divisor of given numbers.';

function startGame(): string
{
    $getTaskGameProgression = function (): array {
        $progression = [];
        $randomNum1 = rand(1, 10);
        $randomNum2 = rand(5, 10);

        for ($i = $randomNum1; $i < ($randomNum1 + $randomNum2); $i++) {
            $progression[] = $i * $randomNum2;
        }

        $randomProgressionNum = rand(0, count($progression) - 1);
        $rightAnswer = $progression[$randomProgressionNum];
        $progression[$randomProgressionNum] = "..";

        $question = implode(' ', $progression);

        return ['question' => $question, 'rightAnswer' => $rightAnswer];
    };

    return getResultGame($getTaskGameProgression, QUESTION_FOR_TASK);
}
