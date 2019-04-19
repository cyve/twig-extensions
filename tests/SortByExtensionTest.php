<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\SortByExtension;
use Cyve\TwigExtensions\Test\Model\Band;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class SortByExtensionTest extends TestCase
{
    /**
     * @dataProvider SortByDataProvider
     */
    public function test($array)
    {
        $loader = new ArrayLoader([
            'sortBy.html.twig' => '{{ array|sortBy("name")|json_encode|raw }}',
            'sortByName.html.twig' => '{{ array|sortByName|json_encode|raw }}',
        ]);
        $twig = new Environment($loader);
        $twig->addExtension(new SortByExtension());

        $this->assertEquals('[{"name":"Metallica","genre":"metal"},{"name":"Nirvana","genre":"rock"}]', $twig->render('sortBy.html.twig', ['array' => $array]));
        $this->assertEquals('[{"name":"Metallica","genre":"metal"},{"name":"Nirvana","genre":"rock"}]', $twig->render('sortByName.html.twig', ['array' => $array]));
    }

    public function sortByDataProvider()
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
