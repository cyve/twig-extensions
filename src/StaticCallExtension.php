<?php

namespace Cyve\TwigExtensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class StaticCallExtension extends AbstractExtension
{
    /**
     * @return array
     */
    public function getFunctions(): array
	{
        return [
            new TwigFunction('staticCall', [$this, 'staticCall']),
        ];
    }

    /**
     * @param string $class
     * @param string $method
     * @param array $args
     * @return mixed
     * @throws \InvalidArgumentException if class or method does not exists
     */
    public function staticCall(string $class, string $method, array $args = [])
	{
        if (!class_exists($class)) {
            throw new \InvalidArgumentException(sprintf('Class %s does not exists', $class));
        }

        if (!method_exists($class, $method)) {
            throw new \InvalidArgumentException(sprintf('Method %s::%s() does not exists', $class, $method));
        }

	    return call_user_func_array([$class, $method], $args);
    }
}

