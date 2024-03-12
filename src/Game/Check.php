<?php

namespace BrainGames\Game\Check;


require_once __DIR__ . '/../../vendor/autoload.php';




use function BrainGames\Game\Engine\run;
use function cli\line;
use function cli\prompt;





const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_RANGE = 1;
const MAX_RANGE = 100;

function play(): void
{
    $round = function () {
        $number = rand(MIN_RANGE, MAX_RANGE);

        $answer = prompt("Question: {$number}");
        line("You answer: {$answer}");
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

        return [$answer, $correctAnswer];
    };

    run(GAME_DESCRIPTION, $round);
}


















