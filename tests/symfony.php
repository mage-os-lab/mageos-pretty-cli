#!/usr/bin/env php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Helper\Helper;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Output\ConsoleOutput;

$application = new Application();

$application->register('test:progress:custom')->setCode(
    function($input, $output) {
        $bar = new ProgressBar(new ConsoleOutput(), 15);

        ProgressBar::setPlaceholderFormatterDefinition('memory', function (ProgressBar $bar) {
            $mem = memory_get_usage();
            $colors = '96';
            return "\033[" . $colors . 'm ' . Helper::formatMemory($mem) . " \033[0m";
        });

        $bar->setFormat("\033[34m %title:-37s% \033[0m\n %current%/%max% %bar% %percent:3s%%\n 🏁  %remaining:-10s% %memory:37s%");
        $bar->setBarCharacter($done = "\033[92m█\033[0m");
        $bar->setEmptyBarCharacter($empty = "\033[91m█\033[0m");
        $bar->setProgressCharacter($progress = "\033[92;101m▶\033[0m");
        $bar->setMessage('Starting the demo... fingers crossed', 'title');
        $bar->start();

        $fillmemory = [];
        for ($i = 0; $i < 15; ++$i) {
            usleep(random_int(400_000,500_000));
            $fillmemory[$i] = range(1,10000);
            $bar->advance();
            if ($i === 6) $bar->setMessage('Almost there!', 'title');
        }

        $bar->setMessage('It works!', 'title');
        $bar->finish();

        $output->writeln("");
        $output->writeln('<info>finished.</info>');

    }

);
$application->register('test:emoji')->setCode(
    function($input, $output) {
        $output->writeln('<info>👍</info>');
    }

);
$application->register('test:progress:style')->setCode(
    function($input, $output) {
        $io = new SymfonyStyle($input, $output);
        $io->title('Using SymfonyStyle');

        $io->progressStart(100);
        $i = 0;
        while ($i++ < 100) {
            usleep(10_000);
            $io->progressAdvance();
        }
        $io->progressFinish();

        $output->writeln("");
        $output->writeln('<info>finished.</info>');
    }
);

$application->run();


