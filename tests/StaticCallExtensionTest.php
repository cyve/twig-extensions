<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\StaticCallExtension;
use Cyve\TwigExtensions\Test\Model\Band;

class StaticCallExtensionTest extends TwigExtensionTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->engine->addExtension(new StaticCallExtension());
    }

    public function test()
    {
        $this->assertEquals('Band,Groupe', $this->engine->render('staticCall.html.twig', ['class' => Band::class, 'method' => 'getClassName', 'args' => ['fr']]));
    }
}
