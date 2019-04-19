<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\FilterByExtension;
use Cyve\TwigExtensions\Test\Model\Band;

class FilterByExtensionTest extends TwigExtensionTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->engine->addExtension(new FilterByExtension());
    }

    /**
     * @dataProvider filterByDataProvider
     */
    public function testFilterBy($array)
    {
        $this->assertEquals('[{"name":"Nirvana","genre":"rock"}]', $this->engine->render('filterBy.html.twig', ['array' => $array]));
    }

    /**
     * @dataProvider filterByDataProvider
     */
    public function testFilterByX($array)
    {
        $this->assertEquals('[{"name":"Nirvana","genre":"rock"}]', $this->engine->render('filterByGenre.html.twig', ['array' => $array]));
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
