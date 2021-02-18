<?php

namespace Brain\Games\Games\Progression;

function getQuestion(): string
{
    $question = [];
    $randomNum1 = rand(1, 10);
    $randomNum2 = rand(5, 10);

    for ($i = $randomNum1; $i < ($randomNum1 + $randomNum2); $i++) {
            $question[] = $i * $randomNum2;
    }

    $randomProgressionNum = rand(0, count($question) - 1);
    $question[$randomProgressionNum] = "..";

    return implode(" ", $question);
}

function getRightAnsver(string $question): int
{
    $progression = explode(' ', $question);
    $variable = '';
    $index = '';

    for ($i = 0; $i < count($progression); $i++) {
        if ($progression[$i] === "..") {
            if ($i >= 2) {
                $index = (int) $progression[1] - (int) $progression[0];
                $variable = $progression[$i - 1];
                $rightAnswer = (int) $variable + (int) $index;
                return (int) $rightAnswer;
            } else {
                $index = (int) $progression[4] - (int) $progression[3];
                $variable = $progression[$i + 1];
                $rightAnswer = (int) $variable -  (int) $index;
                return (int) $rightAnswer;
            }
        }
    }
}
