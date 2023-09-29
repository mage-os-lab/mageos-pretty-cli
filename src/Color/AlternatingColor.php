<?php
declare(strict_types=1);

namespace MageOS\PrettyCli\Color;

class AlternatingColor implements ColorInterface
{
    /**
     * @var array<ColorInterface>
     */
    private array $colors;

    public function __construct(ColorInterface ...$colors)
    {
        $this->colors = $colors;
    }

    public function toColorString(): string
    {
        $result = current($this->colors)->toColorString();
        next($this->colors) || reset($this->colors);

        return $result;
    }

}
