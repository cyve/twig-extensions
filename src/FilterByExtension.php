<?php

namespace Cyve\TwigExtensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FilterByExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('filterBy', [$this, 'filterBy']),
            new TwigFilter('filterBy*', [$this, 'filterByX']),
        ];
    }

    public function filterBy(iterable $array, string $property, $value): array
    {
        if ($array instanceof \Traversable) {
            $array = iterator_to_array($array, false);
        }

        return array_filter($array, function($element) use ($property, $value){
            return $this->getValue($element, $property) === $value;
        });
    }

    public function filterByX(string $property, iterable $array, $value): array
    {
        return $this->filterBy($array, strtolower($property), $value);
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

        throw new \InvalidArgumentException(sprintf('Undefined property "%s"', $property));
    }
}
