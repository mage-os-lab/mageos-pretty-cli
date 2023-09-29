<?php
declare(strict_types=1);

namespace MageOS\PrettyCli\Color;

interface ColorInterface
{
    public function toColorString(): string;

    /**
     * @return array<int> Red, Green and Blue values
     */
    public function toRgb(): array;
}
