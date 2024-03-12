<?php

namespace BrainGames\Engine;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function run ($answer, $correctAnswer)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name");
    line(GAME_DESCRIPTION);

    for ($i=0; $i < ROUND; $i++) {

        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("$answer is wrong answer ;(. Correct answer was $correctAnswer.");
            line("Let's try again, $name!");

            return;
        }
    }

    line("Congratulations, $name!");
}