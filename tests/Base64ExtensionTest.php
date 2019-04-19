<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\Base64Extension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class Base64ExtensionTest extends TestCase
{
    public function test()
    {
        $loader = new ArrayLoader([
            'base64_encode.html.twig' => '{{ value|base64_encode }}',
            'base64_decode.html.twig' => '{{ value|base64_decode }}',
        ]);
        $twig = new Environment($loader);
        $twig->addExtension(new Base64Extension());

        $this->assertEquals('Zm9v', $twig->render('base64_encode.html.twig', ['value' => 'foo']));
        $this->assertEquals('foo', $twig->render('base64_decode.html.twig', ['value' => 'Zm9v']));
    }
}
