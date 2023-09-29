<?php
declare(strict_types=1);

namespace Color;

use MageOS\PrettyCli\Color\AnsiStyle;
use MageOS\PrettyCli\Color\BaseColor;
use MageOS\PrettyCli\Color\HexColor;
use PHPUnit\Framework\TestCase;

class ColorGradientTest extends TestCase
{
    public function testGradientBg()
    {
        $blueToWhite = (new AnsiStyle())
            ->bgGradient(new HexColor('#00f'), new HexColor('#fff'));
        $this->assertEquals(
            '<bg=#0000ff>1</>'.
            '<bg=#5555ff>2</>'.
            '<bg=#aaaaff>3</>'.
            '<bg=#ffffff>4</>',
            $blueToWhite->apply('1234')
        );
    }
    public function testGradientBgFixedWidth()
    {
        $blueToWhite = (new AnsiStyle())
            ->bgGradient(new HexColor('#00f'), new HexColor('#fff'));
        $this->assertEquals(
            '<bg=#0000ff>1</>'.
            '<bg=#5555ff>2</>'.
            '<bg=#aaaaff>3</>'.
            '<bg=#ffffff>4</>',
            $blueToWhite->apply('1234')
        );
    }
    public function testGradientBgWithMultibyte()
    {
        $blueToWhite = (new AnsiStyle())
            ->bgGradient(new HexColor('#00f'), new HexColor('#fff'));
        $this->assertEquals(
            '<bg=#0000ff>ä</>'.
            '<bg=#5555ff>_</>'.
            '<bg=#aaaaff>😀</>'.
            '<bg=#ffffff>_</>',
            $blueToWhite->apply('ä_😀_')
        );
    }
    public function testGradientFg()
    {
        $blueToWhite = (new AnsiStyle())
            ->fgGradient(new HexColor('#00f'), new HexColor('#fff'));
        $this->assertEquals(
            '<fg=#0000ff>1</>'.
            '<fg=#5555ff>2</>'.
            '<fg=#aaaaff>3</>'.
            '<fg=#ffffff>4</>',
            $blueToWhite->apply('1234')
        );
    }
    public function testGradientFgAndFg()
    {
        $blueToWhite = (new AnsiStyle())
            ->bgGradient(new HexColor('#fff'), new HexColor('#00f'))
            ->fgGradient(new HexColor('#00f'), new HexColor('#fff'));
        $this->assertEquals(
            '<fg=#0000ff;bg=#ffffff>1</>'.
            '<fg=#5555ff;bg=#aaaaff>2</>'.
            '<fg=#aaaaff;bg=#5555ff>3</>'.
            '<fg=#ffffff;bg=#0000ff>4</>',
            $blueToWhite->apply('1234')
        );
    }
    public function testGradientWithMultipleColors()
    {
        $blueToWhite = (new AnsiStyle())
            ->bgGradient(
                BaseColor::RED,
                BaseColor::YELLOW,
                BaseColor::GREEN,
            );
        $this->assertEquals(
            '<bg=#aa0000>_</>'.
            '<bg=#aa1100>_</>'.
            '<bg=#aa2200>_</>'.
            '<bg=#aa3300>_</>'.
            '<bg=#aa4400>_</>'.
            '<bg=#aa5500>_</>'.
            '<bg=#7f6a00>_</>'.
            '<bg=#557f00>_</>'.
            '<bg=#2a9400>_</>'.
            '<bg=#00aa00>_</>',
            $blueToWhite->apply('__________')
        );
    }
    public function testGradientBgVertical()
    {
        $blueToWhite = (new AnsiStyle())->bgVerticalGradient(4, new HexColor('#00f'), new HexColor('#fff'));
        $this->assertEquals(
            '<bg=#0000ff>1</>',
            $blueToWhite->apply('1')
        );
        $this->assertEquals(
            '<bg=#5555ff>2</>',
            $blueToWhite->apply('2')
        );
        $this->assertEquals(
            '<bg=#aaaaff>3</>',
            $blueToWhite->apply('3')
        );
        $this->assertEquals(
            '<bg=#ffffff>4</>',
            $blueToWhite->apply('4')
        );
        $this->assertEquals(
            '<bg=#0000ff>5</>',
            $blueToWhite->apply('5'),
            'gradient should repeat'
        );
    }
    public function testGradientFgVertical()
    {
        $blueToWhite = (new AnsiStyle())->fgVerticalGradient(4, new HexColor('#00f'), new HexColor('#fff'));
        $this->assertEquals(
            '<fg=#0000ff>1</>',
            $blueToWhite->apply('1')
        );
        $this->assertEquals(
            '<fg=#5555ff>2</>',
            $blueToWhite->apply('2')
        );
        $this->assertEquals(
            '<fg=#aaaaff>3</>',
            $blueToWhite->apply('3')
        );
        $this->assertEquals(
            '<fg=#ffffff>4</>',
            $blueToWhite->apply('4')
        );
        $this->assertEquals(
            '<fg=#0000ff>5</>',
            $blueToWhite->apply('5'),
            'gradient should repeat'
        );
    }
}
