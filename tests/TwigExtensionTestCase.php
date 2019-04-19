<?php

namespace Cyve\TwigExtensions\Test;

use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class TwigExtensionTestCase extends TestCase
{
    /**
     * @var Environment
     */
    protected $engine;

    protected function setUp(): void
    {
        $this->engine = new Environment(new FilesystemLoader(__DIR__.'/templates'));;
    }

    public function assertRender(string $filename, $content)
    {
        $this->assertStringEqualsFile(__DIR__.'/expectations/'.$filename, $content);
    }
}
