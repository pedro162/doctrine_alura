<?php

namespace Alura\Doctrine\Attributes;

use ReflectionClass;
use Attribute;

#[Attribute]
class AttributeExample
{
    public function __construct(mixed $value)
    {
        print('Receiving value: ' . $value . PHP_EOL);
    }
}

class Entity
{
    #[AttributeExample(42)]
    private string $propriety = 'teste';
}

$reflection = new ReflectionClass(Entity::class);
$prop = $reflection->getProperty('propriety');
$properties = $reflection->getProperties();
$methods = $reflection->getMethods();
$objectInstance = $reflection->newInstanceWithoutConstructor();
$privateProperty = $reflection->getProperty('propriety');
$privateProperty->setAccessible(true);
$privateProperty->setValue($objectInstance, 'new value');
echo ($prop->getValue($objectInstance)) . PHP_EOL;
echo ($privateProperty->getValue($objectInstance)) . PHP_EOL;

foreach ($prop->getAttributes() as $attribute) {
    $instance = $attribute->newInstance();
    echo $instance?->value . PHP_EOL;
}
