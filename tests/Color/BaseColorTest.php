<?php
declare(strict_types=1);

namespace Color;

use MageOS\PrettyCli\Color\BaseColor;
use PHPUnit\Framework\TestCase;

class BaseColorTest extends TestCase
{
    /**
     * @dataProvider dataRgb
     */
    public function testRgbValues(BaseColor $color, array $expectedRgb)
    {
        $this->assertEquals($expectedRgb, $color->toRgb());
    }

    public static function dataRgb()
    {
        yield 'Black' => [BaseColor::BLACK, [0, 0, 0]];
        yield 'Red' => [BaseColor::RED, [170, 0, 0]];
        yield 'Green' => [BaseColor::GREEN, [0, 170, 0]];
        yield 'Yellow' => [BaseColor::YELLOW, [170, 85, 0]];
        yield 'Blue' => [BaseColor::BLUE, [0, 0, 170]];
        yield 'Magenta' => [BaseColor::MAGENTA, [170, 0, 170]];
        yield 'Cyan' => [BaseColor::CYAN, [0, 170, 170]];
        yield 'White' => [BaseColor::WHITE, [170, 170, 170]];
        yield 'Gray' => [BaseColor::GRAY, [85, 85, 85]];
        yield 'Bright Red' => [BaseColor::BRIGHT_RED, [255, 85, 85]];
        yield 'Bright Green' => [BaseColor::BRIGHT_GREEN, [85, 255, 85]];
        yield 'Bright Yellow' => [BaseColor::BRIGHT_YELLOW, [255, 255, 85]];
        yield 'Bright Blue' => [BaseColor::BRIGHT_BLUE, [85, 85, 255]];
        yield 'Bright Magenta' => [BaseColor::BRIGHT_MAGENTA, [255, 85, 255]];
        yield 'Bright Cyan' => [BaseColor::BRIGHT_CYAN, [85, 255, 255]];
        yield 'Bright White' => [BaseColor::BRIGHT_WHITE, [255, 255, 255]];

    }
}
