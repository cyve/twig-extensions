<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\ShuffleExtension;

class ShuffleExtensionTest extends TwigExtensionTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->engine->addExtension(new ShuffleExtension());
    }

    public function testShuffle()
    {
        $array = [0,1,2,3,4,5,6,7,8,9];
        $result = json_decode($this->engine->render('shuffle.html.twig', ['array' => $array]));

        $this->assertCount(10, $result);
        $this->assertNotEquals($array, $result);
        $this->assertTrue(in_array(0, $result));
    }
}
