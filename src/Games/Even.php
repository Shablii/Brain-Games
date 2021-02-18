<?php

namespace Brain\Games\Games\Even;

function getQuestion(): int
{
    return rand(1, 20);
}

function getRightAnsver(int $question): string
{
    if ($question % 2 !== 0) {
        return "no";
    }
    return "yes";
}
