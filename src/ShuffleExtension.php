<?php

namespace Cyve\TwigExtensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ShuffleExtension extends AbstractExtension
{
    /**
     * @return array
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('shuffle', [$this, 'shuffle'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @param iterable $array
     * @return array
     */
    public function shuffle(iterable $array): array
    {
        if ($array instanceof \Traversable) {
            $array = iterator_to_array($array, false);
        }

        shuffle($array);

        return $array;
    }
}
