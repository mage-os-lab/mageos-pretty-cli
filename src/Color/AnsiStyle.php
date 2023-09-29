<?php
declare(strict_types=1);

namespace MageOS\PrettyCli\Color;

class AnsiStyle implements AnsiStyleInterface
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
        //TODO extract to style application strategy, use iterator if styling per character is required
        if ($this->isStyledPerCharacter()) {
            $characters = mb_str_split($string);
            $style = $this;
            //TODO get rid of getColors and have unified interface => less "instanceof" calls
            if ($this->background instanceof ColorGradient) {
                $bgColors = $this->background->getColors(mb_strlen($string));
                $style = $style->alternatingBg(...$bgColors);
            }
            if ($this->foreground instanceof ColorGradient) {
                $fgColors = $this->foreground->getColors(mb_strlen($string));
                $style = $style->alternatingFg(...$fgColors);
            }
            return $style->applyAllFlat($characters);
        }

        $tagParts = [];
        if ($this->foreground) {
            $tagParts[]='fg='.$this->foreground->toColorString();
        }
        if ($this->background) {
            $tagParts[]='bg='.$this->background->toColorString();
        }
        //TODO define and apply options (bold etc)
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

    //TODO generate shortcuts for all basic colors, e.g.
    //public function bgBrightBlue(): self

    public function bgGradient(ColorInterface $from, ColorInterface ...$to): self
    {
        return $this->background(new ColorGradient($from, ...$to));
    }

    public function fgGradient(ColorInterface $from, ColorInterface ...$to)
    {
        return $this->foreground(new ColorGradient($from, ...$to));
    }

    public function alternatingBg(ColorInterface ...$colors)
    {
        return $this->background(new AlternatingColor(...$colors));
    }

    public function alternatingFg(ColorInterface ...$colors)
    {
        return $this->foreground(new AlternatingColor(...$colors));
    }

    /**
     * @param array<string> $strings
     * @return array<string>
     */
    public function applyAll(array $strings): array
    {
        return \array_map(
            fn(string $s) => $this->apply($s),
            $strings
        );
    }

    /**
     * @param array<string> $strings
     * @return string
     */
    public function applyAllFlat(array $strings): string
    {
        return implode('', $this->applyAll($strings));
    }

    private function isStyledPerCharacter()
    {
        return $this->foreground instanceof ColorGradient || $this->background instanceof ColorGradient;
    }
}
