<?php

namespace Cyve\TwigExtensions\Test\Model;

class Band implements \JsonSerializable
{
    private $name;
    private $genre;

    public function __construct(string $name, string $genre = null)
    {
        $this->name = $name;
        $this->genre = $genre;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function jsonSerialize(): array
    {
        return ['name' => $this->name, 'genre' => $this->genre];
    }

    public static function getClassName($lang = 'en'): string
    {
        $name = [
            'en' => 'Band',
            'fr' => 'Groupe',
        ];

        return $name[$lang];
    }
}
