<?php

namespace Cyve\TwigExtensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigTest;

class InstanceOfExtension extends AbstractExtension
{
    /**
     * @return array
     */
    public function getTests(): array
    {
        return [
            new TwigTest('instanceof', [$this, 'isInstanceOf']),
        ];
    }

    /**
     * @param object $object
     * @param string $class
     * @return bool
     */
    public function isInstanceOf($object, string $class): bool
    {
        return $object instanceof $class;
    }
}
