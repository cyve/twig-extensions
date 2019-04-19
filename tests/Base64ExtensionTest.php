<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\Base64Extension;

class Base64ExtensionTest extends TwigExtensionTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->engine->addExtension(new Base64Extension());
    }

    public function test()
    {
        $this->assertEquals('Zm9v', $this->engine->render('base64_encode.html.twig', ['value' => 'foo']));
        $this->assertEquals('foo', $this->engine->render('base64_decode.html.twig', ['value' => 'Zm9v']));
    }
}
