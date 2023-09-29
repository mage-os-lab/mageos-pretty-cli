#!/usr/bin/env php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use MageOS\PrettyCli\Color\AnsiStyle;
use MageOS\PrettyCli\Color\BaseColor;
use MageOS\PrettyCli\Color\ColorGradient;
use MageOS\PrettyCli\Color\HexColor;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Color;
use Symfony\Component\Console\Helper\Helper;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\ProgressIndicator;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Output\ConsoleOutput;

$application = new Application();

$application->register('test:ansi:class')->setCode(
    function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {

        // using symfony console Color class and taking --no-ansi into account
        $red = $output->isDecorated() ? new Color('bright-red', 'yellow') : new Color();
        $output->writeln("Using Console\Color: " . $red->apply('this is bright red on yellow') . ', nice');
    }

);
$application->register('test:ansi:tags')->setCode(
    function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {
        // using symfony console tags which already take --no-ansi into account
        $output->writeln("Using tags: <fg=bright-red;bg=yellow>this is bright red on yellow</> nice");
    }
);
$application->register('test:ansi:simple')->setCode(
    code: function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {
        $warningStyle = (new AnsiStyle)->foreground(BaseColor::BRIGHT_RED)->background(BaseColor::YELLOW);
        $output->writeln("STYLO: " . $warningStyle->apply('this is bright red on yellow') . ', nice');
    }
);
$application->register('test:ansi:alternating')->setCode(
    code: function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {
        $redAlternating = (new AnsiStyle)->alternatingBg(BaseColor::BRIGHT_RED, BaseColor::RED);
        $output->writeln($redAlternating->apply('First Line'));
        $output->writeln($redAlternating->apply('Second Line '));
        $output->writeln($redAlternating->apply('Hellooooooooooooooooooooooooooo'));
        $output->writeln($redAlternating->apply('Last Line'));
        $blueAlternatingFg = (new AnsiStyle)->alternatingFg(
            BaseColor::BLUE,
            BaseColor::BRIGHT_BLUE,
            BaseColor::CYAN,
            BaseColor::BRIGHT_CYAN
        );
        $output->writeln(
            $blueAlternatingFg->applyAllFlat(["I'm ", 'blue ', 'dabba', 'dee', 'dabba', 'di', 'dabba', 'dee'])
        );

        $mixedAlternating = (new AnsiStyle)->alternatingFg(BaseColor::BLUE, BaseColor::RED)->alternatingBg(
                BaseColor::BRIGHT_WHITE,
                BaseColor::WHITE,
                BaseColor::GRAY,
                BaseColor::BLACK,
                BaseColor::GRAY,
                BaseColor::WHITE
            );
        foreach (range(1, 10) as $i) {
            $output->writeln($mixedAlternating->apply('Line ' . $i));
        }
    }
);
$application->register('test:ansi:rainbow')->setCode(
    code: function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {
        $rainbow = (new AnsiStyle)->alternatingBg(
            new HexColor('#f00'),
            new HexColor('#f80'),
            new HexColor('#ff0'),
            new HexColor('#8f0'),
            new HexColor('#0f0'),
            new HexColor('#0f8'),
            new HexColor('#0ff'),
            new HexColor('#08f'),
            new HexColor('#00f'),
            new HexColor('#80f'),
            new HexColor('#f0f'),
        );
        foreach (range(1, 20) as $i) {
            $output->write($rainbow->apply(' '));
        }
        $output->writeln('');
    }
);
$application->register('test:ansi:gradient:chatgpt')->setCode(
    code: function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {

        function generateGradient($colorA, $colorB, $steps)
        {
            $gradient = [];
            for ($i = 0; $i < $steps; $i++) {
                $R          = $colorA[0] + $i * ($colorB[0] - $colorA[0]) / ($steps - 1);
                $G          = $colorA[1] + $i * ($colorB[1] - $colorA[1]) / ($steps - 1);
                $B          = $colorA[2] + $i * ($colorB[2] - $colorA[2]) / ($steps - 1);
                $gradient[] = [intval($R), intval($G), intval($B)];
            }
            return $gradient;
        }

        function hexToRgb($hex)
        {
            // Entfernt das '#' am Anfang, falls es vorhanden ist
            $hex = ltrim($hex, '#');
            // Zerlegt den HEX-Wert in RGB-Komponenten
            sscanf($hex, "%02x%02x%02x", $r, $g, $b);
            return [$r, $g, $b];
        }

        $gradient = array_map(
            fn(array $rgb) => HexColor::fromRgb(...$rgb),
            generateGradient((new HexColor('#000000'))->toRgb(), (new HexColor('#ffffff'))->toRgb(), 20)
        );

        $style = (new AnsiStyle)->alternatingBg(
            ...$gradient
        );
        foreach (range(1, 20) as $i) {
            $output->write($style->apply(' '));
        }
        $output->writeln('');
    }
);
$application->register('test:ansi:gradient:bg')->setCode(
    code: function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {
        $blueToWhite = (new AnsiStyle)->fgGradient(BaseColor::WHITE, BaseColor::BLUE)->bgGradient(
            new HexColor('#00f'),
            new HexColor('#fff')
        );
        $output->writeln($blueToWhite->apply('Hellooooooooooooooooooooooooooo'));
        $output->writeln($blueToWhite->apply('Hellooooooooooooooooooooooooooooooooooooooo'));
    }
);
$application->register('test:ansi:gradient:vertical')->setCode(
    code: function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {
        $blueToWhite = (new AnsiStyle)->fgVerticalGradient(6, BaseColor::BRIGHT_WHITE, BaseColor::BRIGHT_BLUE);
        for ($i = 0; $i < 6; ++$i) {
            $output->writeln($blueToWhite->apply(str_repeat('╠╣', 40)));
        }
    }
);
$application->register('test:ansi:gradient:rainbow')->setCode(
    code: function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {
        $rainbow = (new AnsiStyle)
            ->foreground(ColorGradient::presets()->rainbow())
            ->background(ColorGradient::presets()->rainbowBright());
        $output->writeln((new AnsiStyle(background: HexColor::fromRgb(...BaseColor::BRIGHT_MAGENTA->toRgb())))->apply('Hellooooooooooooooooooooooooooooooooooooooooo'));
        $output->writeln($rainbow->apply('Hellooooooooooooooooooooooooooooooooooooooooo'));
        $output->writeln($rainbow->apply('Helloooooooooooooooooooooooooooooooooooooooooo'));
        $output->writeln($rainbow->apply('Hellooooooooooooooooooooooooooooooooooooooooooo'));
        $output->writeln($rainbow->apply('Helloooooooooooooooooooooooooooooooooooooooooooo'));
        $output->writeln($rainbow->apply('Hellooooooooooooooooooooooooooooooooooooooooooooo'));
        $output->writeln($rainbow->apply('Helloooooooooooooooooooooooooooooooooooooooooooooo'));
        $output->writeln($rainbow->apply('Hellooooooooooooooooooooooooooooooooooooooooooooooo'));
        $output->writeln((new AnsiStyle(background: HexColor::fromRgb(...BaseColor::BRIGHT_MAGENTA->toRgb())))->apply('Hellooooooooooooooooooooooooooooooooooooooooooooooo'));
    }
);
$application->register('test:ansi:gradient:vertical-rainbow-preset')->setCode(
    code: function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {
        $rainbow = (new AnsiStyle)
            ->fgVerticalGradient(10, ColorGradient::presets()->rainbowRgb());
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
        $output->writeln($rainbow->apply('█████████████████████████████████████████████████'));
    }
);
$application->register('test:ansi:sandbox')->setCode(
    code: function ($input, \Symfony\Component\Console\Output\OutputInterface $output) {
        /*
         * how I would like to use it
         */

        // defining styles

        // fg and bg for main colors via enums, implementing a toColorString() method
        $warningStyle = (new AnsiStyle)->foreground(BaseColor::BRIGHT_RED)->background(BaseColor: YELLOW);
        // fg and bg for true colors via HexColor, implementing toColorString() method
        $trueColorStyle = (new AnsiStyle)->foreground(new HexColor('#fade00'))->background(new HexColor('#000000'));
        // shortcuts
        $blue = (new AnsiStyle)->fgBlue();
        $hex  = (new AnsiStyle)->fgHex('#fade00')->bgHex('#000000');
        // named arguments
        $warningStyle = new AnsiStyle(foreground: BaseColor::BRIGHT_RED, background: BaseColor::YELLOW);

        // gradients with two or more colors
        $blueGradient = (new AnsiStyle)->bgGradient(['#0000ff', '#cc00ff']);
        // gradients with fixed width
        $blueGradient20 = (new AnsiStyle)->bgGradient(['#0000ff', '#cc00ff'], 20);
        // gradient presets
        $rainbowGradient = (new AnsiStyle)->fgGradient(AnsiStyle::RAINBOW);

        // alternating for each apply() call, e.g. for table rows
        $white         = (new AnsiStyle)->background(BaseColor::WHITE);
        $lightGray     = (new AnsiStyle)->background(BaseColor::GRAY);
        $grayAlternate = (new AnsiStyle)->alternating($lightGray, $white);

        // using styles
        $output->writeln("Using custom class: " . $warningStyle->apply('this is bright red on yellow') . ', nice');
        $output->writeln("Gradient " . $rainbowGradient->apply('rainbow with variable width') . ', nice');

        // on array: for progress indicator
        $spinner = $blue->applyToAll(
            [
                '⠏',
                '⠛',
                '⠹',
                '⢸',
                '⣰',
                '⣤',
                '⣆',
                '⡇',
            ]
        );
    }
);

$application->register('test:progress:indicator')->setCode(
    function (
        \Symfony\Component\Console\Input\InputInterface $input,
        \Symfony\Component\Console\Output\ConsoleOutputInterface $output
    ) {

        $spinner = array_map(fn($c) => "<fg=blue>$c</>", [
            '⠏',
            '⠛',
            '⠹',
            '⢸',
            '⣰',
            '⣤',
            '⣆',
            '⡇',
        ]);

        $progressIndicator = new ProgressIndicator($output, 'verbose', 100, $spinner);
        $progressIndicator->start('Processing...');
        $i = 0;
        while ($i++ < 50) {
            usleep(100_000);
            $progressIndicator->advance();
        }
        $progressIndicator->finish('Processing... Done!');

        $output->writeln("");
        $output->writeln('<info>finished.</info>');
    }
);

$application->run();


