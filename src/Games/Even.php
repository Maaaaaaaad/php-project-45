<?php

namespace BrainGames\Games\Even;


require_once __DIR__ . '/../../vendor/autoload.php';


use function cli\line;
use function cli\prompt;

define('GAME_DESCRIPTION', 'Answer "yes" if the number is even, otherwise answer "no".');
define('MAX_POINT', 100);
define('MIN_POINT', 0);
define('ROUND', 3);


function play(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name");
    line(GAME_DESCRIPTION);

    for ($i=0; $i < ROUND; $i++) {

        $question = rand(MIN_POINT, MAX_POINT);
        line("Question: $question");
        $answer = prompt('Your answer');
        $correctAnswer = $question % 2 == 0 ? 'yes' : 'no';

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















