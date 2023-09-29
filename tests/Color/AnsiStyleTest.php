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
    public function testAlternatingBg()
    {
        $redAlternating = (new AnsiStyle)->alternatingBg(BaseColor::BRIGHT_RED, BaseColor::RED);
        $this->assertEquals('<bg=bright-red>First Line</>', $redAlternating->apply('First Line'));
        $this->assertEquals('<bg=red>Second Line</>', $redAlternating->apply('Second Line'));
        $this->assertEquals('<bg=bright-red>Third Line</>', $redAlternating->apply('Third Line'));
    }
    public function testAlternatingFg()
    {
        $redAlternating = (new AnsiStyle)->alternatingFg(BaseColor::BRIGHT_RED, BaseColor::RED);
        $this->assertEquals('<fg=bright-red>First Line</>', $redAlternating->apply('First Line'));
        $this->assertEquals('<fg=red>Second Line</>', $redAlternating->apply('Second Line'));
        $this->assertEquals('<fg=bright-red>Third Line</>', $redAlternating->apply('Third Line'));
    }
    public function testCombineAlternatingFgAndBg()
    {
        $style = (new AnsiStyle)
            ->alternatingFg(BaseColor::BRIGHT_RED, BaseColor::RED)
            ->alternatingBg(BaseColor::BRIGHT_WHITE, BaseColor::WHITE, BaseColor::GRAY, BaseColor::BLACK, BaseColor::GRAY, BaseColor::WHITE);
        $this->assertEquals('<fg=bright-red;bg=bright-white>1. Line</>', $style->apply('1. Line'));
        $this->assertEquals('<fg=red;bg=white>2. Line</>', $style->apply('2. Line'));
        $this->assertEquals('<fg=bright-red;bg=gray>3. Line</>', $style->apply('3. Line'));
        $this->assertEquals('<fg=red;bg=black>4. Line</>', $style->apply('4. Line'));
        $this->assertEquals('<fg=bright-red;bg=gray>5. Line</>', $style->apply('5. Line'));
        $this->assertEquals('<fg=red;bg=white>6. Line</>', $style->apply('6. Line'));
        $this->assertEquals('<fg=bright-red;bg=bright-white>7. Line</>', $style->apply('7. Line'));
    }
}
