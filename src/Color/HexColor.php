<?php
declare(strict_types=1);

namespace MageOS\PrettyCli\Color;

class HexColor implements ColorInterface
{
    private string $hexString;

    public function __construct(
        string $hexString
    )
    {
        //TODO validate format #xxxxxx or #xxx
        $this->hexString = $hexString;
    }

    public static function fromValue(int $hexValue)
    {
        //TODO implement, can be used as HexColor::fromValue(0xffffff)
    }

    public function toColorString(): string
    {
        return $this->hexString;
    }

    public static function fromRgb(int $red, int $green, int $blue)
    {
        return new self(sprintf("#%02x%02x%02x", $red, $green, $blue));

    }

    /**
     * @return array<int> Red, Green and Blue values
     */
    public function toRgb(): array {
        $hex = ltrim($this->toColorString(), '#');
        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }
        sscanf($hex, "%02x%02x%02x", $r, $g, $b);
        return [$r, $g, $b];
    }

}
