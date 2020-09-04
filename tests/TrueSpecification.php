<?php

namespace Tests;

use StrikeLabs\Specification\SpecificationInterface;

class TrueSpecification implements SpecificationInterface
{
    public function isSatisfiedBy($object): bool
    {
        return true;
    }
}
