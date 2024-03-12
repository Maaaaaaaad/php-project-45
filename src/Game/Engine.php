<?php

namespace BrainGames\Game\Engine;

require_once __DIR__ . '/../../vendor/autoload.php';


const ROUNDS = 3;

use function cli\line;
use function cli\prompt;



function run(string $gameDescription, callable $round): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello {$name}");
    line($gameDescription);

    for ($i = 0; $i < ROUNDS; $i++) {
        [$answer, $correctAnswer] = $round();

        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}!");
}