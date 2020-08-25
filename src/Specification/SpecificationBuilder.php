<?php

namespace StrikeLabs\Specification;

final class SpecificationBuilder implements SpecificationInterface
{
    private $specification;

    public function __construct(SpecificationInterface $specification)
    {
        $this->specification = $specification;
    }

    public function and(SpecificationInterface $specification): self
    {
        $this->specification = new AndSpecification($this->specification, $specification);

        return $this;
    }

    public function or(SpecificationInterface $specification): self
    {
        $this->specification = new OrSpecification($this->specification, $specification);

        return $this;
    }

    public function isSatisfiedBy($object): bool
    {
        return $this->specification->isSatisfiedBy($object);
    }
}