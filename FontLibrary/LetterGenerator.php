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
    "1" => <<<CHAR

  ███╗
 ████║
██╔██║
╚═╝██║
███████╗
╚══════╝
CHAR,

    "2" => <<<CHAR
██████╗
╚════██╗
  ███╔═╝
██╔══╝
███████╗
╚══════╝
CHAR,

    "3" => <<<CHAR
██████╗
╚════██╗
 █████╔╝
 ╚═══██╗
██████╔╝
╚═════╝
CHAR,

    "4" => <<<CHAR
  ██╗██╗
 ██╔╝██║
██╔╝ ██║
███████║
╚════██║
     ╚═╝
CHAR,
    "5" => <<<CHAR
███████╗
██╔════╝
██████╗
╚════██╗
██████╔╝
╚═════╝
CHAR,
    "6" => <<<CHAR
 █████╗
██╔═══╝
██████╗
██╔══██╗
╚█████╔╝
 ╚════╝
CHAR,
    "7" => <<<CHAR
███████╗
╚════██║
    ██╔╝
   ██╔╝
  ██╔╝
  ╚═╝
CHAR,
    "8" => <<<CHAR
 █████╗
██╔══██╗
╚█████╔╝
██╔══██╗
╚█████╔╝
 ╚════╝
CHAR,
    "9" => <<<CHAR
 █████╗
██╔══██╗
╚██████║
 ╚═══██║
 █████╔╝
 ╚════╝
CHAR,
    "?" => <<<CHAR
 █████╗
██╔══██╗
╚═╝███╔╝
   ╚══╝
   ██╗
   ╚═╝
CHAR,
    "!" => <<<CHAR
██╗
██║
██║
╚═╝
██╗
╚═╝
CHAR,
    "." => <<<CHAR





██╗
╚═╝
CHAR,
    "," => <<<CHAR



██╗
╚█║
 ╚╝
CHAR,
    "<" => <<<CHAR
  ██╗
 ██╔╝
██╔╝
╚██╗
 ╚██╗
  ╚═╝
CHAR,
    ">" => <<<CHAR
██╗
╚██╗
 ╚██╗
 ██╔╝
██╔╝
╚═╝
CHAR,
    "=" => <<<CHAR

██████╗
╚═════╝
██████╗
╚═════╝

CHAR,
    "+" => <<<CHAR

  ██╗
██████╗
╚═██╔═╝
  ╚═╝

CHAR,
    "-" => <<<CHAR


█████╗
╚════╝


CHAR,
    "_" => <<<CHAR




██████████╗
╚═════════╝
CHAR,"/" => <<<CHAR
    ██╗
   ██╔╝
  ██╔╝
 ██╔╝
██╔╝
╚═╝
CHAR,
    "#" => <<<CHAR
  ██╗ ██╗
██████████╗
╚═██╔═██╔═╝
██████████╗
╚██╔═██╔══╝
 ╚═╝ ╚═╝
CHAR,
    ":" => <<<CHAR

██╗
╚═╝


██╗
╚═╝
CHAR,
    "$" => <<<CHAR
 ███████╗
██╔██╔══╝
╚██████╗
 ╚═██╔██╗
███████╔╝
╚══════╝
CHAR,
    "[" => <<<CHAR
████╗
██╔═╝
██║
██║
████╗
╚═══╝
CHAR,
    "]" => <<<CHAR
████╗
╚═██║
  ██║
  ██║
████║
╚═══╝
CHAR


];

$application = new Application();

$application->register('test:alphabet')->setCode(
    function ($input, $output) {

        // Run with: ./FontLibrary/LetterGenerator.php test:alphabet
        $input = 'Rangaha = Yes';
        $letterSpacing = 1;

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

            $outputStyle = new OutputFormatterStyle($redGradient[$i], options: ['bold']);
            $output->getFormatter()->setStyle('fire', $outputStyle);

            foreach ($inputStringArray as $currentChar) {
                // Handle whitespaces in a cheap way :D

                // Maybe if arrayKeyExists?

                if (array_key_exists($currentChar, $lettersArray)) {
                    $lineOutput .= $lettersArray[$currentChar][$i];
                    $lineOutput .= str_repeat(' ', max($letterSpacing, 1));
                }

                if ($currentChar === ' ') {
                    $lineOutput .= '   ';
                }
            }
            $output->writeln('<fire>' . $lineOutput . '</fire>');
        }
    }
);

$application->run();


