<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\ReplaceUrlsExtension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class ReplaceUrlsExtensionTest extends TestCase
{
    public function test()
    {
        $loader = new ArrayLoader([
            'replaceUrls.html.twig' => '{{ text|replaceUrls }}',
        ]);
        $twig = new Environment($loader);
        $twig->addExtension(new ReplaceUrlsExtension());

        $this->assertEquals('Lorem ipsum <a href="https://cyvemedias.fr" target="_blank">https://cyvemedias.fr</a> sit dolor amet', $twig->render('replaceUrls.html.twig', ['text' => 'Lorem ipsum https://cyvemedias.fr sit dolor amet']));
        $this->assertEquals('Lorem ipsum <a href="https://username:password@www.cyvemedias.fr/path/file.html?foo=bar#hash" target="_blank">https://username:password@www.cyvemedias.fr/path/file.html?foo=bar#hash</a> sit dolor amet', $twig->render('replaceUrls.html.twig', ['text' => 'Lorem ipsum https://username:password@www.cyvemedias.fr/path/file.html?foo=bar#hash sit dolor amet']));
    }
}
