#!/usr/bin/env php
<?php
declare(strict_types=1);

namespace FontLibrary;

require_once __DIR__ . '/../vendor/autoload.php';

//use FontLibrary\Model\Alphabet;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Bitte vergebt uns unsere Schuld, wie auch wir wissen, dass eine Gotte-Klasse keine gute Idee ist.
 * Doch der Auto-Loader war nicht mit uns... :x
 */

/**
 * Link:
 * (FontLetterStuff)[https://fsymbols.com/generators/tarty/]
 */
const ALPHABET = [
    "A" => <<<CHAR
 █████╗
██╔══██╗
███████║
██╔══██║
██║  ██║
╚═╝  ╚═╝
CHAR,

    "B" => <<<CHAR
██████╗
██╔══██╗
██████╦╝
██╔══██╗
██████╦╝
╚═════╝
CHAR,

    "C" => <<<CHAR
 █████╗
██╔══██╗
██║  ╚═╝
██║  ██╗
╚█████╔╝
 ╚════╝
CHAR,

    "D" => <<<CHAR
██████╗
██╔══██╗
██║  ██║
██║  ██║
██████╔╝
╚═════╝
CHAR,

    "E" => <<<CHAR
███████╗
██╔════╝
█████╗
██╔══╝
███████╗
╚══════╝
CHAR,

    "F" =>
        <<<CHAR
███████╗
██╔════╝
██████╗
██╔═══╝
██║
╚═╝
CHAR,

    "G" => <<<CHAR
 ██████╗
██╔════╝
██║  ██╗
██║  ╚██╗
╚██████╔╝
 ╚═════╝
CHAR,

    "H" => <<<CHAR
██╗  ██╗
██║  ██║
███████║
██╔══██║
██║  ██║
╚═╝  ╚═╝
CHAR,

    "I" => <<<CHAR
██╗
██║
██║
██║
██║
╚═╝
CHAR,

    "J" => <<<CHAR
     ██╗
     ██║
     ██║
██╗  ██║
╚█████╔╝
 ╚════╝
CHAR,

    "K" => <<<CHAR
██╗  ██╗
██║ ██╔╝
█████╔╝
██╔═██╗
██║  ██║
╚═╝  ╚═╝
CHAR,

    "L" => <<<CHAR
██╗
██║
██║
██║
███████╗
╚══════╝
CHAR,

    "M" => <<<CHAR
███╗   ███╗
████╗ ████║
██╔████╔██║
██║╚██╔╝██║
██║ ╚═╝ ██║
╚═╝     ╚═╝
CHAR,

    "N" => <<<CHAR
███╗  ██╗
████╗ ██║
██╔██╗██║
██║╚████║
██║ ╚███║
╚═╝  ╚══╝
CHAR,

    "O" => <<<CHAR
 █████╗
██╔══██╗
██║  ██║
██║  ██║
╚█████╔╝
 ╚════╝
CHAR,

    "P" => <<<CHAR
██████╗
██╔══██╗
██████╔╝
██╔═══╝
██║
╚═╝
CHAR,

    "Q" => <<<CHAR
 ██████╗
██╔═══██╗
██║██╗██║
╚██████╔╝
 ╚═██╔═╝
   ╚═╝
CHAR,

    "R" => <<<CHAR
██████╗
██╔══██╗
██████╔╝
██╔══██╗
██║  ██║
╚═╝  ╚═╝
CHAR,

    "S" => <<<CHAR
 ██████╗
██╔════╝
╚█████╗
 ╚═══██╗
██████╔╝
╚═════╝
CHAR,

    "T" => <<<CHAR
████████╗
   ██╔══╝
   ██║
   ██║
   ██║
   ╚═╝
CHAR,

    "U" => <<<CHAR
██╗   ██╗
██║   ██║
██║   ██║
██║   ██║
╚██████╔╝
 ╚═════╝
CHAR,

    "V" => <<<CHAR
██╗   ██╗
██║   ██║
╚██╗ ██╔╝
 ╚████╔╝
  ╚██╔╝
   ╚═╝
CHAR,

    "W" => <<<CHAR
 ██╗       ██╗
 ██║  ██╗  ██║
 ╚██╗████╗██╔╝
  ████╔═████║
  ╚██╔╝ ╚██╔╝
   ╚═╝   ╚═╝
CHAR,

    "X" => <<<CHAR
██╗  ██╗
╚██╗██╔╝
 ╚███╔╝
 ██╔██╗
██╔╝╚██╗
╚═╝  ╚═╝
CHAR,

    "Y" => <<<CHAR
██╗   ██╗
╚██╗ ██╔╝
 ╚████╔╝
  ╚██╔╝
   ██║
   ╚═╝
CHAR,

    "Z" => <<<CHAR
███████╗
╚════██║
  ███╔═╝
██╔══╝
███████╗
╚══════╝
CHAR,
    " " => " ",
];

$application = new Application();

$application->register('test:alphabet')->setCode(
    function ($input, $output) {

        // Run with: ./FontLibrary/LetterGenerator.php test:alphabet
        $input = 'Hackathon Yee';
        $letterSpacing = 1;
        $foregroundColor = '#ffff00';
        $options = ['bold'];

        // Style Output
        $outputStyle = new OutputFormatterStyle($foregroundColor, options: $options);
        $output->getFormatter()->setStyle('fire', $outputStyle);

        $upperCase = strtoupper($input);
        $inputStringArray = str_split($upperCase);

        // Fill parts of letters with padding according to their actual width
        $lettersArray = array_map(
            static function ($c) {
                $a = explode(PHP_EOL, $c);
                return array_map(
                    static fn($l) => mb_str_pad($l, max(array_map('mb_strlen', $a)) + 1),
                    explode(PHP_EOL, $c)
                );
            },
            ALPHABET
        );

        $redGradient = array(
            "#fdba74",
            "#fb923c",
            "#f97316",
            "#ea580c",
            "#c2410c",
            "#9a3412",
        );

        $rainbowGradient = array(
            "#FF0000", // Red
            "#FF7F00", // Orange
            "#FFFF00", // Yellow
            "#00FF00", // Green
            "#0000FF", // Blue
            "#4B0082", // Indigo
            "#8B00FF"  // Violet
        );

        // Print output line by line
        for ($i = 0; $i < 6; $i++) {
            $lineOutput = '';

            $outputStyle = new OutputFormatterStyle($rainbowGradient[$i], options: $options);
            $output->getFormatter()->setStyle('fire', $outputStyle);

            foreach ($inputStringArray as $currentChar) {
                // Handle whitespaces in a cheap way :D
                if ($currentChar === ' ') {
                    $lineOutput .= '   ';
                } else {
                    $lineOutput .= $lettersArray[$currentChar][$i];
                    $lineOutput .= str_repeat(' ', max($letterSpacing, 1));
                }
            }
            $output->writeln('<fire>' . $lineOutput . '</fire>');
        }
    }
);

$application->run();


