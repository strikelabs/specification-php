<?php

namespace StrikeLabs\Specification;

interface SpecificationInterface
{
    /**
     * @param mixed $object
     *
     * @return bool
     */
    public function isSatisfiedBy($object): bool;
}