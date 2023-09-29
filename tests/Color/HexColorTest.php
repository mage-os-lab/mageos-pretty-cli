<?php
declare(strict_types=1);

namespace Color;

use MageOS\PrettyCli\Color\HexColor;
use PHPUnit\Framework\TestCase;

class HexColorTest extends TestCase
{
    public function testFromRgb()
    {
        $color = HexColor::fromRgb(255, 128, 64);
        $this->assertEquals('#ff8040', $color->toColorString());
    }

    public function testToRgb()
    {
        $color = new HexColor('#ff8040');
        $this->assertEquals([255, 128, 64], $color->toRgb());
    }

    public function testThreeDigitsToRgb()
    {
        $color = new HexColor('#f0c');
        $this->assertEquals([255, 0, 204], $color->toRgb());
    }

}
