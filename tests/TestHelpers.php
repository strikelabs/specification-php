<?php

namespace StrikeLabs\Specification;

class TrueSpecification implements SpecificationInterface
{
    public function isSatisfiedBy($object): bool
    {
        return true;
    }
}

class FalseSpecification implements SpecificationInterface
{
    public function isSatisfiedBy($object): bool
    {
        return false;
    }
}
