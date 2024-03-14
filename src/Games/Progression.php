<?php

namespace BrainGames\src\Games\Progression;

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

const GAME_DESCRIPTION = "What number is missing in the progression?";
const MAX_POINT = 100;
const MIN_POINT = 0;

const ITER = 10;


function game()
{
    $index = array();
    $rand = rand(MIN_POINT, ITER);

    for ($i = rand(MIN_POINT, MAX_POINT); ITER > count($index); $i += $rand) {
        $index[] = $i;
    }
    return $index;
}
function play()
{
    $round = function () {

        $array = game();

        $correctAnswer = array_rand(array_flip($array));

        $array [array_search($correctAnswer, $array, false)] = "..";


        $question = implode(' ', $array);

        line("Question: {$question} ");
        $answer = prompt('Your answer');

        return [$answer, $correctAnswer];
    };

    run(GAME_DESCRIPTION, $round);
}
