<?php

namespace BrainGames\src\Games\Prime;

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

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_POINT = 100;
const MIN_POINT = 0;



function game($question)
{
    if ($question < 2) {
        return false;
    } for ($i = 2; $i < $question; $i++) {
        if ($question % $i === 0) {
            return false;
        }
    }
    return true;
}
function play()
{
    $round = function () {

        $question = rand(MIN_POINT, MAX_POINT);
        line("Question: {$question} ");
        $answer = prompt('Your answer');
        $correctAnswer = game($question) ? 'yes' : 'no';
        return [$answer, $correctAnswer];
    };
    run(GAME_DESCRIPTION, $round);
}
