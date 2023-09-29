<?php
declare(strict_types=1);

namespace MageOS\PrettyCli\Color;

enum BaseColor: string implements ColorInterface
{
    case BLACK = 'black';
    case RED = 'red';
    case GREEN = 'green';
    case YELLOW = 'yellow';
    case BLUE = 'blue';
    case MAGENTA = 'magenta';
    case CYAN = 'cyan';
    case WHITE = 'white';
    case DEFAULT = 'default';
    case GRAY = 'gray';
    case BRIGHT_RED = 'bright-red';
    case BRIGHT_GREEN = 'bright-green';
    case BRIGHT_YELLOW = 'bright-yellow';
    case BRIGHT_BLUE = 'bright-blue';
    case BRIGHT_MAGENTA = 'bright-magenta';
    case BRIGHT_CYAN = 'bright-cyan';
    case BRIGHT_WHITE = 'bright-white';

    public function toColorString(): string
    {
        return $this->value;
    }
}
