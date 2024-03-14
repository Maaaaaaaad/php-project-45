<?php

namespace BrainGames\src\Games\Progression;

require_once __DIR__ . '/../../vendor/autoload.php';

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

        $array [array_search($correctAnswer, $array)] = "..";


        $question = implode(' ', $array);

        line("Question: {$question} ");
        $answer = prompt('Your answer');

        return [$answer, $correctAnswer];
    };

    run(GAME_DESCRIPTION, $round);
}
