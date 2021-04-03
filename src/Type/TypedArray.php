<?php

namespace Wicketd\FilterReflection\Type;

use Webmozart\Assert\Assert;

abstract class TypedArray extends \ArrayObject
{
    /**
     * @param mixed[] $elements
     */
    public function __construct(array $elements = [])
    {
        $this->_assertElementsAreValid($elements);

        parent::__construct($elements);
    }

    /**
     * @param mixed[] $elements
     */
    private function _assertElementsAreValid(array $elements): void
    {
        Assert::allIsAnyOf($elements, static::getValidElementTypes());
    }

    /**
     * @return mixed[]
     */
    abstract protected static function getValidElementTypes(): array;
}
