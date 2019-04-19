<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\StaticCallExtension;
use Cyve\TwigExtensions\Test\Model\Band;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class StaticCallExtensionTest extends TestCase
{
    public function test()
    {
        $loader = new ArrayLoader([
            'staticCall.html.twig' => '{{ staticCall(class, method) }}',
            'staticCallWithArgument.html.twig' => '{{ staticCall(class, method, args) }}',
        ]);
        $twig = new Environment($loader);
        $twig->addExtension(new StaticCallExtension());

        $this->assertEquals('Band', $twig->render('staticCall.html.twig', ['class' => Band::class, 'method' => 'getClassName']));
        $this->assertEquals('Groupe', $twig->render('staticCallWithArgument.html.twig', ['class' => Band::class, 'method' => 'getClassName', 'args' => ['fr']]));
    }
}
