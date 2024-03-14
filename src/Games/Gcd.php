<?php

namespace BrainGames\src\Games\Gcd;

require_once __DIR__ . '/../../vendor/autoload.php';

use function BrainGames\Engine\run;
use function cli\line;
use function cli\prompt;

const GAME_DESCRIPTION = "What is the result of the expression?";
const MAX_POINT = 100;
const MIN_POINT = 0;


function gcd($firstPoint, $secondPoint)
{
    return ($firstPoint % $secondPoint) ? gcd($secondPoint, $firstPoint % $secondPoint) : abs($secondPoint);
}

function play()
{
    $round = function () {
        $firstPoint = rand(MIN_POINT, MAX_POINT);
        $secondPoint = rand(MIN_POINT, MAX_POINT);
        line("Question: {$firstPoint} {$secondPoint}");
        $answer = prompt('Your answer');
        return [$answer, gcd($firstPoint, $secondPoint)];
    };

    run(GAME_DESCRIPTION, $round);
}
