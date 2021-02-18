<?php

namespace Brain\Games\Games\Prime;

function getQuestion(): int
{
    return rand(1, 54);
}

function getRightAnsver(int $question): string
{
    if ($question <= 2) {
        return "yes";
    } elseif ($question % 2 === 0) {
        return "no";
    } else {
        for ($i = 2; $i <= round(sqrt($question)); $i++) {
            if (($question % $i === 0)) {
                return "no";
            }
        }
        return "yes";
    }
}
