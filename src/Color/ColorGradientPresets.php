<?php
declare(strict_types=1);

namespace MageOS\PrettyCli\Color;

class ColorGradientPresets
{
    public const RAINBOW = [
        BaseColor::RED,
        BaseColor::YELLOW,
        BaseColor::GREEN,
        BaseColor::CYAN,
        BaseColor::BLUE,
        BaseColor::MAGENTA
    ];
    public const BRIGHT_RAINBOW = [
        BaseColor::BRIGHT_RED,
        BaseColor::BRIGHT_YELLOW,
        BaseColor::BRIGHT_GREEN,
        BaseColor::BRIGHT_CYAN,
        BaseColor::BRIGHT_BLUE,
        BaseColor::BRIGHT_MAGENTA
    ];

    public function rainbow(): ColorGradient
    {
        return new ColorGradient(...self::RAINBOW);
    }
    public function rainbowBright(): ColorGradient
    {
        return new ColorGradient(...self::BRIGHT_RAINBOW);
    }
    public function rainbowRgb(): ColorGradient
    {
        return new ColorGradient(
            HexColor::fromRgb(255, 0, 0),
            HexColor::fromRgb(255, 154, 0),
            HexColor::fromRgb(208, 222, 33),
            HexColor::fromRgb(79, 220, 74),
            HexColor::fromRgb(63, 218, 216),
            HexColor::fromRgb(47, 201, 226),
            HexColor::fromRgb(28, 127, 238),
            HexColor::fromRgb(95, 21, 242),
            HexColor::fromRgb(186, 12, 248),
            HexColor::fromRgb(251, 7, 217),
        );
    }
}
