<?php

namespace Brain\Games\Games\Calc;

function getQuestion(): string
{
     $randomNum1 = rand(5, 10);
         $randomNum2 = rand(1, 5);
         $symbols = ["+", "*", "-"];
         $symbol = $symbols[rand(0, 2)];
         $question = "{$randomNum1} {$symbol} {$randomNum2}";
         return $question;
}

function getRightAnsver($question): int
{
    $Answer = explode(' ', $question);
    switch ($Answer[1]) {
        case "+":
            return $Answer[0] + $Answer[2];
        case "*":
            return $Answer[0] * $Answer[2];
        case "-":
            return $Answer[0] - $Answer[2];
    }
}
