<?php

namespace Cyve\TwigExtensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Base64Extension extends AbstractExtension
{
    /**
     * @return array
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('base64_encode', 'base64_encode', ['is_safe' => ['html', 'js', 'css', 'url', 'attr_html']]),
            new TwigFilter('base64_decode', 'base64_decode', ['is_safe' => ['html', 'js', 'css', 'url', 'attr_html']]),
        ];
    }
}
