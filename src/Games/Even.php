<?php

namespace BrainGames\Games\Even;


require_once __DIR__ . '/../../vendor/autoload.php';

use function BrainGames\Engine\run;
use function cli\line;
use function cli\prompt;

define('GAME_DESCRIPTION', 'Answer "yes" if the number is even, otherwise answer "no".');
define('MAX_POINT', 100);
define('MIN_POINT', 0);
define('ROUND', 3);


function play(): void
{

    $question = rand(MIN_POINT, MAX_POINT);
    line("Question: $question");
    $answer = prompt('Your answer');
    $correctAnswer = $question % 2 == 0 ? 'yes' : 'no';

    run($answer, $correctAnswer);

}















