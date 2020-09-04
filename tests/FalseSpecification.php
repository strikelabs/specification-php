<?php

namespace Tests;

use StrikeLabs\Specification\SpecificationInterface;

class FalseSpecification implements SpecificationInterface
{
    public function isSatisfiedBy($object): bool
    {
        return false;
    }
}