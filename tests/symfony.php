#!/usr/bin/env php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Helper\ProgressBar;

$application = new Application();

$application->register('test:progress')->setCode(
    function($input, $output) {
        // creates a new progress bar (50 units)
        $progressBar = new ProgressBar($output, 50);

        // starts and displays the progress bar
        $progressBar->start();

        $i = 0;
        while ($i++ < 50) {
            // ... do some work
            usleep(10_000);

            // advances the progress bar 1 unit
            $progressBar->advance();

            // you can also advance the progress bar by more than 1 unit
            // $progressBar->advance(3);
        }

        // ensures that the progress bar is at 100%
        $progressBar->finish();

        $output->writeln("");
        $output->writeln('<info>finished.</info>');

    }
);

$application->run();


