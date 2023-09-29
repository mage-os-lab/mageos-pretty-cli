<?php
declare(strict_types=1);

namespace MageOS\PrettyCli\Color;

//TODO remove if not needed
interface AnsiStyleInterface
{
    public function foreground(ColorInterface $color): AnsiStyleInterface;
    public function background(ColorInterface $color): AnsiStyleInterface;
    public function apply(string $string): string;
}
