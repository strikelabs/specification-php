<?php

namespace StrikeLabs\Specification;

interface SpecificationInterface
{
    public function isSatisfiedBy($object): bool;
}