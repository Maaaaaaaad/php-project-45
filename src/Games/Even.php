<?php

namespace BrainGames\Games\Even;

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

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MAX_POINT = 100;
const MIN_POINT = 0;



function play()
{

    $round = function () {
        $question = rand(MIN_POINT, MAX_POINT);
        line("Question: $question");
        $answer = prompt('Your answer');
        $correctAnswer = $question % 2 == 0 ? 'yes' : 'no';

        return [$answer, $correctAnswer];
    };

    run(GAME_DESCRIPTION, $round);
}
