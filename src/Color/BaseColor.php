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

    private const VGA_RGB = [
        'black'          => [0, 0, 0],
        'red'            => [170, 0, 0],
        'green'          => [0, 170, 0],
        'yellow'         => [170, 85, 0],
        'blue'           => [0, 0, 170],
        'magenta'        => [170, 0, 170],
        'cyan'           => [0, 170, 170],
        'white'          => [170, 170, 170],
        'gray'           => [85, 85, 85],
        'bright-red'     => [255, 85, 85],
        'bright-green'   => [85, 255, 85],
        'bright-yellow'  => [255, 255, 85],
        'bright-blue'    => [85, 85, 255],
        'bright-magenta' => [255, 85, 255],
        'bright-cyan'    => [85, 255, 255],
        'bright-white'   => [255, 255, 255],
    ];

    public function toColorString(): string
    {
        return $this->value;
    }

    /**
     * Returns RGB value based on VGA color table
     * @link https://en.wikipedia.org/wiki/ANSI_escape_code
     *
     * @return array<int>
     */
    public function toRgb(): array
    {
        return self::VGA_RGB[$this->value];
    }
}
