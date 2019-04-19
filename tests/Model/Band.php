<?php

namespace Cyve\TwigExtensions\Test\Model;

class Band implements \JsonSerializable
{
    private $name;
    private $genre;

    public function __construct($name, $genre = null)
    {
        $this->name = $name;
        $this->genre = $genre;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function jsonSerialize()
    {
        return ['name' => $this->name, 'genre' => $this->genre];
    }

    public static function getClassName($lang = 'en')
    {
        $name = [
            'en' => 'Band',
            'fr' => 'Groupe',
        ];

        return $name[$lang];
    }
}
