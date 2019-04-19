<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\InstanceOfExtension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class InstanceOfExtensionTest extends TestCase
{
    public function test()
    {
        $loader = new ArrayLoader([
            'instanceof.html.twig' => '{% if value is instanceof("\\DateTime") %}true{% else %}false{% endif %}',
        ]);
        $twig = new Environment($loader);
        $twig->addExtension(new InstanceOfExtension());

        $this->assertEquals('true', $twig->render('instanceof.html.twig', ['value' => new \DateTime()]));
        $this->assertEquals('false', $twig->render('instanceof.html.twig', ['value' => new \StdClass()]));
        $this->assertEquals('false', $twig->render('instanceof.html.twig', ['value' => []]));
        $this->assertEquals('false', $twig->render('instanceof.html.twig', ['value' => 'foo']));
    }
}
