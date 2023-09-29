#!/usr/bin/env php
<?php
declare(strict_types=1);

namespace FontLibrary;

require_once __DIR__ . '/../vendor/autoload.php';

//use FontLibrary\Model\Alphabet;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

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
    "0" => <<<CHAR
 █████╗
██╔══██╗
██║  ██║
██║  ██║
╚█████╔╝
 ╚════╝
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
CHAR, "/" => <<<CHAR
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

const INPUT = 'Sub 2 Finn R.';

const RAINBOW = [
    "#FF0000", // Red
    "#FF7F00", // Orange
    "#FFFF00", // Yellow
    "#00FF00", // Green
    "#0000FF", // Blue
    "#4B0082", // Indigo
    "#8B00FF"  // Violet
];

const RED_GRADIENT = array(
    "#fdba74",
    "#fb923c",
    "#f97316",
    "#ea580c",
    "#c2410c",
    "#9a3412",
);

const ANIMATION_SPEED = 1_500;
const LETTER_SPACING = 1;



function generateGradient($colorA, $colorB, $steps)
{
    $gradient = [];
    for ($i = 0; $i < $steps; $i++) {
        $R = $colorA[0] + $i * ($colorB[0] - $colorA[0]) / ($steps - 1);
        $G = $colorA[1] + $i * ($colorB[1] - $colorA[1]) / ($steps - 1);
        $B = $colorA[2] + $i * ($colorB[2] - $colorA[2]) / ($steps - 1);

        $gradient[] = rgbToHex(intval($R), intval($G), intval($B));
    }
    return $gradient;
}

function rgbToHex($r, $g, $b)
{
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}

function reOrderGradient(array $gradient): array
{
    if (count($gradient) <= 1) {
        return [];
    }

    $newGradientOrder = [];
    for ($i = 0, $j = 1; $i < count($gradient); $i++, $j++) {
        if ($i === (count($gradient) - 1)) {
            $j = 0;
        }
        $newGradientOrder[$j] = $gradient[$i];
    }
    return $newGradientOrder;
}

function generateLettersArray(): array
{
    // Fill parts of letters with padding according to their actual width
    return array_map(
        static function ($c) {
            $a = explode(PHP_EOL, $c);
            return array_map(
                static fn($l) => mb_str_pad($l, max(array_map('mb_strlen', $a)) + 1),
                explode(PHP_EOL, $c)
            );
        },
        ALPHABET
    );
}

function generateLineOutput(string $input, int $index)
{
    $upperCase = strtoupper($input);
    $inputStringArray = str_split($upperCase);

    $lettersArray = generateLettersArray();
    $lineOutput = '';

    foreach ($inputStringArray as $currentChar) {
        // Handle whitespaces in a cheap way :D

        // Maybe if arrayKeyExists?

        if (array_key_exists($currentChar, $lettersArray)) {
            $lineOutput .= $lettersArray[$currentChar][$index];
            $lineOutput .= str_repeat(' ', max(LETTER_SPACING, 1));
        }

        if ($currentChar === ' ') {
            $lineOutput .= '   ';
        }
    }
    return $lineOutput;
}

$application = new Application();

$application->register('test:alphabet')->setCode(
    function ($input, $output) {

        // Run with: ./FontLibrary/LetterGenerator.php test:alphabet
        $input = INPUT;

        // Print output line by line
        for ($i = 0; $i < 6; $i++) {

            $outputStyle = new OutputFormatterStyle(RED_GRADIENT[$i], options: ['bold']);
            $output->getFormatter()->setStyle('fire', $outputStyle);
            $lineOutput = generateLineOutput($input, $i);

            $output->writeln('<fire>' . $lineOutput . '</fire>');
        }
    }
);

$application->register('test:alphabet:effect')->setCode(
    function ($input, $output) {
        $input = INPUT;

        $colorA = [255, 0, 0];  // Rot
        $colorB = [0, 0, 255];  // Blau
        $steps = 6;
        $newRainbow = generateGradient($colorA, $colorB, $steps);

        $gradient = RAINBOW;

        $iterations = 25;
        for ($j = 0; $j < $iterations; $j++) {
            $section = $output->section();

            // Print output line by line
            for ($i = 0; $i < 6; $i++) {

                $outputStyle = new OutputFormatterStyle($gradient[$i], options: ['bold']);
                $output->getFormatter()->setStyle('fire', $outputStyle);
                $lineOutput = generateLineOutput($input, $i);

                $section->writeln('<fire>' . $lineOutput . '</fire>');
            }
            usleep(80_000);
            if ($j < $iterations - 1) {
                $section->clear();
            }
            $gradient = reOrderGradient($gradient);
        }
    }
);

$application->register('test:alphabet:animate')->setCode(
    function ($input, $output) {

        $sectionAnimate = $output->section();

        $upperCase = strtoupper(INPUT);
        $inputStringArray = str_split($upperCase);

        // Fill parts of letters with padding according to their actual width
        $lettersArray = generateLettersArray();


        // What character(s) are being displayed?
        for ($GLOBAL_CHARACTER_WIDTH_X = 0; $GLOBAL_CHARACTER_WIDTH_X < count($inputStringArray); $GLOBAL_CHARACTER_WIDTH_X++) {

            // How many fragments does the last character have?
            for ($GLOBAL_CHARACTER_HEIGHT_Y = 0; $GLOBAL_CHARACTER_HEIGHT_Y < 6; $GLOBAL_CHARACTER_HEIGHT_Y++) {

                // Draw all fragments of previous, and the existing letter until GLOBAL_Y

                // Horizontal Index
                $entireString = '';
                for ($LOCAL_Y = 0; $LOCAL_Y < 6; $LOCAL_Y++) {

                    $lineOutput = '';
                    $X_WIDTH = $LOCAL_Y <= $GLOBAL_CHARACTER_HEIGHT_Y ? $GLOBAL_CHARACTER_WIDTH_X + 1 : $GLOBAL_CHARACTER_WIDTH_X;

                    // Vertical Index
                    for ($LOCAL_X = 0; $LOCAL_X < $X_WIDTH; $LOCAL_X++) {
                        $currentChar = $inputStringArray[$LOCAL_X];

                        if (array_key_exists($currentChar, $lettersArray)) {
                            $lineOutput .= $lettersArray[$currentChar][$LOCAL_Y];
                            $lineOutput .= str_repeat(' ', LETTER_SPACING);
                        }

                        // Add gap for whitespace
                        if ($currentChar === ' ') {
                            $lineOutput .= '   ';
                        }
                    }

                    $entireString .= PHP_EOL . $lineOutput;
                    usleep(ANIMATION_SPEED);
                }
                $sectionAnimate->overwrite($entireString);
            }
        }
    }
);

$application->register('test:alphabet:animate:color')->setCode(
    function ($input, $output) {

        $sectionAnimate = $output->section();

        $upperCase = strtoupper(INPUT);
        $inputStringArray = str_split($upperCase);

        // Fill parts of letters with padding according to their actual width
        $lettersArray = generateLettersArray();

        // What character(s) are being displayed?
        for ($GLOBAL_CHARACTER_WIDTH_X = 0; $GLOBAL_CHARACTER_WIDTH_X < count($inputStringArray); $GLOBAL_CHARACTER_WIDTH_X++) {

            // How many fragments does the last character have?
            for ($GLOBAL_CHARACTER_HEIGHT_Y = 0; $GLOBAL_CHARACTER_HEIGHT_Y < 6; $GLOBAL_CHARACTER_HEIGHT_Y++) {

                // Draw all fragments of previous, and the existing letter until GLOBAL_Y
                $sectionAnimate->clear();

                // Horizontal Index
                for ($LOCAL_Y = 0; $LOCAL_Y < 6; $LOCAL_Y++) {
                    $outputStyle = new OutputFormatterStyle(RED_GRADIENT[$LOCAL_Y], options: ['bold']);
                    $sectionAnimate->getFormatter()->setStyle('fire', $outputStyle);

                    $lineOutput = '';
                    $X_WIDTH = $LOCAL_Y <= $GLOBAL_CHARACTER_HEIGHT_Y ? $GLOBAL_CHARACTER_WIDTH_X + 1 : $GLOBAL_CHARACTER_WIDTH_X;

                    // Vertical Index
                    for ($LOCAL_X = 0; $LOCAL_X < $X_WIDTH; $LOCAL_X++) {
                        $currentChar = $inputStringArray[$LOCAL_X];
                        if (array_key_exists($currentChar, $lettersArray)) {
                            $lineOutput .= $lettersArray[$currentChar][$LOCAL_Y];
                        }

                        // Add gap for whitespace
                        if ($currentChar === ' ') {
                            $lineOutput .= '   ';
                        }
                    }

                    $sectionAnimate->writeln('<fire>' . $lineOutput . '<fire>');
                    usleep(ANIMATION_SPEED*10);
                }
            }
        }
    }
);

$application->run();


