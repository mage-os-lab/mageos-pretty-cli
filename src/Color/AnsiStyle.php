<?php
declare(strict_types=1);

namespace MageOS\PrettyCli\Color;

class AnsiStyle
{
    public function __construct(
        private ?ColorInterface $foreground = null,
        private ?ColorInterface $background = null,
    )
    {
    }

    public function foreground(ColorInterface $color): self
    {
        $style = clone $this;
        $style->foreground = $color;

        return $style;
    }

    public function background(ColorInterface $color): self
    {
        $style = clone $this;
        $style->background = $color;

        return $style;
    }

    public function apply(string $string): string
    {
        $tagParts = [];
        if ($this->foreground) {
            $tagParts[]='fg='.$this->foreground->toColorString();
        }
        if ($this->background) {
            $tagParts[]='bg='.$this->background->toColorString();
        }
        //TODO apply options (bold etc)
        if (!empty($tagParts)) {
            $tag = implode(';', $tagParts);
            return "<$tag>$string</>";
        }
        return $string;
    }

    public function bgHex(string $string): self
    {
        return $this->background(new HexColor($string));
    }

    public function fgHex(string $string): self
    {
        return $this->foreground(new HexColor($string));
    }

}
