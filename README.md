# twig-extensions

#### base64_encode (filter)
Encodes data with MIME base64
```twig
{{ 'lorem ipsum sit dolor amet'|base64_encode }} # bG9yZW0gaXBzdW0gc2l0IGRvbG9yIGFtZXQ=
```

#### base64_decode (filter)
Decodes data encoded with MIME base64
```twig
{{ 'bG9yZW0gaXBzdW0gc2l0IGRvbG9yIGFtZXQ='|base64_decode }}
```

#### shuffle (filter)
 Shuffle an array
 ```twig
{% set elements = ['lorem', 'ipsum', 'sit', 'dolor', 'amet']|shuffle %}
```

#### replaceUrls (filter)
Replace URL by <a> tag in a string
```twig
{{ 'lorem ipsum https://example.com sit dolor amet'|replaceUrls }} # lorem ipsum <a href="https://example.com" target="_blank">https://example.com</a> sit dolor amet
```

#### filterBy (filter)
Filter a collection by its property
```twig
{% set elements = elements|filterBy('name', 'John') }}
{% set elements = elements|filterByName('John') }}
```

#### sortBy (filter)
Sort a collection by its property
```twig
{% set elements = elements|sortBy('name') }}
{% set elements = elements|sortByName }}
```

#### instanceof (test)
Determine whether a Twig variable is an instantiated object of a certain class
```twig
{% if object instanceof 'MyClass' %}
    # object is an instance of class MyClass
{% endif %}
```

#### staticCall (function)
Call an class static function
```twig
{% set value = staticCall('MyClass', 'myMethod') %}
```
