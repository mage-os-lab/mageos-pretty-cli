<?php
declare(strict_types=1);

namespace MageOS\PrettyCli\Progress;

use Symfony\Component\Console\Helper\ProgressIndicator;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\ConsoleSectionOutput;

class MultiProgressIndicator
{
    public function __construct(
        private readonly ConsoleOutputInterface $output,
        /** @var array<ProgressIndicator> */
        private array $progressIndicators = [],
    ) {
    }

    //TODO provide presets for indicator values with nice animations and colors

    public function addProgressIndicator(
        ?string $format = null,
        int $indicatorChangeInterval = 100,
        array $indicatorValues = null
    ): ProgressIndicator {
        $section = $this->output->section();
        // override as there is no interface to decorate
        $progressIndicator = new class(
            $section, $format, $indicatorChangeInterval, $indicatorValues
        ) extends ProgressIndicator {
            public function __construct(
                private readonly ConsoleSectionOutput $output,
                string $format = null,
                int $indicatorChangeInterval = 100,
                array $indicatorValues = null
            ) {
                parent::__construct($output, $format, $indicatorChangeInterval, $indicatorValues);
            }

            public function advance()
            {
                $this->output->clear();
                parent::advance();
            }
        };
        $this->progressIndicators[] = $progressIndicator;

        return $progressIndicator;
    }
}
