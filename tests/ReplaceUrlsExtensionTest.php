<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\ReplaceUrlsExtension;

class ReplaceUrlsExtensionTest extends TwigExtensionTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->engine->addExtension(new ReplaceUrlsExtension());
    }

    public function test()
    {
        $this->assertEquals('Lorem ipsum <a href="https://cyvemedias.fr" target="_blank">https://cyvemedias.fr</a> sit dolor amet', $this->engine->render('replaceUrls.html.twig', ['text' => 'Lorem ipsum https://cyvemedias.fr sit dolor amet']));
        $this->assertEquals('Lorem ipsum <a href="https://username:password@www.cyvemedias.fr/path/file.html?foo=bar#hash" target="_blank">https://username:password@www.cyvemedias.fr/path/file.html?foo=bar#hash</a> sit dolor amet', $this->engine->render('replaceUrls.html.twig', ['text' => 'Lorem ipsum https://username:password@www.cyvemedias.fr/path/file.html?foo=bar#hash sit dolor amet']));
    }
}
