<?php

namespace BrainGames\src\Games\Gcd;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function BrainGames\Engine\run;
use function cli\line;
use function cli\prompt;

const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.";
const MAX_POINT = 100;
const MIN_POINT = 0;


function gcd($firstPoint, $secondPoint) : int
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
