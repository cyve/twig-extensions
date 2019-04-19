<?php

namespace Cyve\TwigExtensions\Test;

use Cyve\TwigExtensions\ShuffleExtension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class ShuffleExtensionTest extends TestCase
{
    public function test()
    {
        $loader = new ArrayLoader([
            'shuffle.html.twig' => '{{ array|shuffle|json_encode|raw }}',
        ]);
        $twig = new Environment($loader);
        $twig->addExtension(new ShuffleExtension());

        $array = [0,1,2,3,4,5,6,7,8,9];
        $result = json_decode($twig->render('shuffle.html.twig', ['array' => $array]));

        $this->assertCount(10, $result);
        $this->assertNotEquals($array, $result);
        $this->assertTrue(in_array(0, $result));
    }
}
