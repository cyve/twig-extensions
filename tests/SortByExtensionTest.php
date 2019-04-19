<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\SortByExtension;
use Cyve\TwigExtensions\Test\Model\Band;

class SortByExtensionTest extends TwigExtensionTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->engine->addExtension(new SortByExtension());
    }

    /**
     * @dataProvider SortByDataProvider
     */
    public function testSortBy($array)
    {
        $this->assertEquals('[{"name":"Metallica","genre":"metal"},{"name":"Nirvana","genre":"rock"}]', $this->engine->render('sortBy.html.twig', ['array' => $array]));
    }

    /**
     * @dataProvider SortByDataProvider
     */
    public function testSortByX($array)
    {
        $this->assertEquals('[{"name":"Metallica","genre":"metal"},{"name":"Nirvana","genre":"rock"}]', $this->engine->render('sortByName.html.twig', ['array' => $array]));
    }

    public function SortByDataProvider()
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
