<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\FilterByExtension;
use Cyve\TwigExtensions\Test\Model\Band;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class FilterByExtensionTest extends TestCase
{
    /**
     * @dataProvider filterByDataProvider
     */
    public function test($array)
    {
        $loader = new ArrayLoader([
            'filterBy.html.twig' => '{{ array|filterBy("genre", "rock")|json_encode|raw }}',
            'filterByGenre.html.twig' => '{{ array|filterByGenre("rock")|json_encode|raw }}',
        ]);
        $twig = new Environment($loader);
        $twig->addExtension(new FilterByExtension());

        $this->assertEquals('[{"name":"Nirvana","genre":"rock"}]', $twig->render('filterBy.html.twig', ['array' => $array]));
        $this->assertEquals('[{"name":"Nirvana","genre":"rock"}]', $twig->render('filterByGenre.html.twig', ['array' => $array]));
    }

    public function filterByDataProvider()
    {
        yield [[
            ['name' => 'Nirvana', 'genre' => 'rock'],
            ['name' => 'Metallica', 'genre' => 'metal'],
        ]];
        yield [[
            (object) ['name' => 'Nirvana', 'genre' => 'rock'],
            (object) ['name' => 'Metallica', 'genre' => 'metal'],
        ]];
        yield [[
            new Band('Nirvana', 'rock'),
            new Band('Metallica', 'metal'),
        ]];
        yield [new \ArrayIterator([
            ['name' => 'Nirvana', 'genre' => 'rock'],
            ['name' => 'Metallica', 'genre' => 'metal'],
        ])];
    }
}
