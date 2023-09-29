<?php

namespace MageOS\FancyCLI\Setup;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Helper;


class ProgressbarLogger extends \Magento\Framework\Setup\ConsoleLogger
{
    /**
     * @var ProgressBar
     */
    protected $bar;

    /**
     * __construct
     *
     * @param OutputInterface $output
     */
    public function __construct(OutputInterface $output)
    {
        parent::__construct($output);
    }

    /**
     * startProgress
     */
    public function startProgress()
    {
        if ($this->bar) {
            return;
        }

        $this->bar = new ProgressBar($this->console, 0);

        ProgressBar::setPlaceholderFormatterDefinition('memory', function (ProgressBar $bar) {
            static $i = 0;
            $mem = memory_get_usage(true);
            $colors = $i++ ? '41;37' : '44;37';
            return "\033[" . $colors . 'm ' . Helper::formatMemory($mem) . " \033[0m";
        });

        $this->bar->setFormat(" \033[44;37m %title:-37s% \033[0m\n %current%/%max% %bar% %percent:3s%%\n 🏁  %remaining:-10s% %memory:37s%");
        $this->bar->setBarCharacter($done = "\033[32m●\033[0m");
        $this->bar->setEmptyBarCharacter($empty = "\033[31m●\033[0m");
        $this->bar->setProgressCharacter($progress = "\033[32m \033[0m");

        // this will break with an exception in Symfony/Console 4.x at least
        /* $this->bar->setProgressCharacter($progress = "\033[32m➤ \033[0m"); */
    }

    /**
     * isProgressVisible
     * @return bool
     *
     */
    public function isProgressVisible() : bool
    {
        return $this->bar != null;
    }

    /**
     * showProgress
     *
     * @param int $current
     * @param int $max
     */
    public function showProgress(int $current, int $max)
    {
        $this->bar->setMaxSteps($max);
        $this->bar->setProgress($current);
        flush();
        usleep(2_000);
    }

    /**
     * setProgressbarMessage
     *
     * @param string $message
     */
    public function setProgressbarMessage(string $message)
    {
        if ($this->bar) {
            $this->bar->setMessage($message, 'title');
            flush();
        }
    }

    /**
     * finishProgress
     *
     */
    public function finishProgress()
    {
        $this->bar->clear();
        $this->bar = null;
    }

    /**
     * {@this->inheritdoc}
     */
    public function log($message)
    {
        if (!$this->isProgressVisible()) {
            parent::log($message);
        }

        $this->setProgressbarMessage($message);
    }

    /**
     * {@inheritdoc}
     */
    public function logInline($message)
    {
        if (!$this->isProgressVisible()) {
            parent::logInline($message);
        }
        $this->setProgressbarMessage($message);
    }

    /**
     * {@inheritdoc}
     */
    public function logMeta($message)
    {
        if (!$this->isProgressVisible()) {
            parent::logMeta($message);
        }
        $this->setProgressbarMessage($message);
    }
}
