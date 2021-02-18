<?php

namespace Brain\Games\Games\Gcd;

function getQuestion(): string
{
    $randomNum1 = rand(1, 10);
    $randomNum2 = rand(1, 10);

    return "{$randomNum1} {$randomNum2}";
}

function getRightAnsver($question): int
{
    [$randomNum1, $randomNum2] = explode(" ", $question);
    $minNum = ($randomNum1 >= $randomNum2) ? $randomNum2 : $randomNum1 ;
    while ($minNum >= 1) {
        if ($randomNum1 % $minNum === 0 && $randomNum2 % $minNum === 0) {
            return $minNum;
        }
        $minNum--;
    }
}
