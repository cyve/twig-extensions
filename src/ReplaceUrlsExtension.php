<?php

namespace Cyve\TwigExtensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ReplaceUrlsExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('replaceUrls', [$this, 'replaceUrls'], ['is_safe' => ['html']]),
        ];
    }

    public function replaceUrls(string $value): string
    {
        return preg_replace("/(https?:\/\/)+[a-zA-Z0-9-_.:\/#@?=&%+]+/", '<a href="$0" target="_blank">$0</a>', $value);
    }
}
