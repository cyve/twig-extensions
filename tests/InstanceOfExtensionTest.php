<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\InstanceOfExtension;

class InstanceOfExtensionTest extends TwigExtensionTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->engine->addExtension(new InstanceOfExtension());
    }

    public function testInstanceOf()
    {
        $this->assertEquals('true', $this->engine->render('instanceof.html.twig', ['value' => new \DateTime()]));
        $this->assertEquals('false', $this->engine->render('instanceof.html.twig', ['value' => new \StdClass()]));
        $this->assertEquals('false', $this->engine->render('instanceof.html.twig', ['value' => []]));
        $this->assertEquals('false', $this->engine->render('instanceof.html.twig', ['value' => 'foo']));
    }
}
