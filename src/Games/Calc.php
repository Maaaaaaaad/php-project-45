<?php

namespace BrainGames\src\Games\Calc;

require_once __DIR__ . '/../../vendor/autoload.php';

use function BrainGames\Engine\run;
use function cli\line;
use function cli\prompt;

const GAME_DESCRIPTION = "What is the result of the expression?";
const MAX_POINT = 100;
const MIN_POINT = 0;



function play()
{

    $round = function () {
        $firstPoint = rand(MIN_POINT, MAX_POINT);
        $secondPoint = rand(MIN_POINT, MAX_POINT);
        $randomValue = array_rand(array_flip(['*', '+', '-']));

        line("Question: {$firstPoint} {$randomValue} {$secondPoint}");

        $answer = prompt('Your answer');

        if ($randomValue == '-') {
            $correctAnswer = $firstPoint - $secondPoint;
        } elseif ($randomValue == '+') {
            $correctAnswer = $firstPoint + $secondPoint;
        } else {
            $correctAnswer = $firstPoint * $secondPoint;
        }


        return [$answer, $correctAnswer];
    };

    run(GAME_DESCRIPTION, $round);
}
