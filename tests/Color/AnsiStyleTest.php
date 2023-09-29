<?php
declare(strict_types=1);

namespace Color;

use MageOS\PrettyCli\Color\AnsiStyle;
use MageOS\PrettyCli\Color\BaseColor;
use PHPUnit\Framework\TestCase;

class AnsiStyleTest extends TestCase
{
    public function testEmptyStyle()
    {
        $style = new AnsiStyle(
        );
        $this->assertEquals('TEXT', $style->apply('TEXT'));
    }
    public function testSingleBaseColor()
    {
        $style = new AnsiStyle(
            foreground: BaseColor::BLUE,
            background: BaseColor::BRIGHT_YELLOW
        );
        $this->assertEquals('<fg=blue;bg=bright-yellow>TEXT</>', $style->apply('TEXT'));
    }
    public function testSingleBaseColorOnlyFg()
    {
        $style = new AnsiStyle(
            foreground: BaseColor::BLUE,
        );
        $this->assertEquals('<fg=blue>TEXT</>', $style->apply('TEXT'));
    }
    public function testSingleBaseColorOnlyBg()
    {
        $style = new AnsiStyle(
            background: BaseColor::BRIGHT_YELLOW
        );
        $this->assertEquals('<bg=bright-yellow>TEXT</>', $style->apply('TEXT'));
    }
    public function testChainedFgAndBg()
    {
        $style = (new AnsiStyle())->background(BaseColor::BRIGHT_CYAN)->foreground(BaseColor::MAGENTA);
        $this->assertEquals('<fg=magenta;bg=bright-cyan>TEXT</>', $style->apply('TEXT'));
    }
    public function testChainedHexShortcuts()
    {
        $style = (new AnsiStyle())->bgHex('#ee0000')->fgHex('#0000ee');
        $this->assertEquals('<fg=#0000ee;bg=#ee0000>TEXT</>', $style->apply('TEXT'));
    }
}
