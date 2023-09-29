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
        //TODO validate format #xxxxxx
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

}
