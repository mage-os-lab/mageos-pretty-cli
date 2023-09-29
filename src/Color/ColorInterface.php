<?php
declare(strict_types=1);

namespace MageOS\PrettyCli\Color;

interface ColorInterface
{
    public function toColorString(): string;
}
