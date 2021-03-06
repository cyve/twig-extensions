<?php

namespace Cyve\TwigExtensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class SortByExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('sortBy', [$this, 'sortBy']),
            new TwigFilter('sortBy*', [$this, 'sortByX']),
        ];
    }

    public function sortBy(iterable $array, string $property): array
    {
        if ($array instanceof \Traversable) {
            $array = iterator_to_array($array, false);
        }

        usort($array, function($a, $b) use ($property){
            return $this->getValue($a, $property) <=> $this->getValue($b, $property);
        });

        return $array;
    }

    public function sortByX(string $property, iterable $array): array
    {
        return $this->sortBy($array, strtolower($property));
    }

    private function getValue($element, string $property)
    {
        if (is_array($element) && isset($element[$property])) {
            return $element[$property];
        }

        if (is_object($element)) {
            if (method_exists($element, $method = 'get'.ucfirst($property))) {
                return $element->$method();
            }

            if (property_exists($element, $property)) {
                return $element->{$property};
            }
        }

        throw new \InvalidArgumentException(sprintf('Undefined property `%s`', $property));
    }
}
