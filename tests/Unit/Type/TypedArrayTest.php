<?php

namespace Wicketd\FilterReflection\Test\Unit\Type;

use PHPUnit\Framework\TestCase;
use Wicketd\FilterReflection\Type\TypedArray;

final class TypedArrayTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testElementsValid(): void
    {
        new FooCollection([new Bar, new Baz]);
    }

    public function testElementsInvalid(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new FooCollection([new Bar, new Qux]);
    }
}

class FooCollection extends TypedArray
{
    protected static function getValidElementTypes(): array
    {
        return [Bar::class, Baz::class];
    }
}

// phpcs:disable
class Bar {}
class Baz {}
class Qux {}
