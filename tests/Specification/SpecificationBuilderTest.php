<?php

namespace Tests\Specification;

use PHPUnit\Framework\TestCase;
use stdClass;
use StrikeLabs\Specification\SpecificationBuilder;
use Tests\{FalseSpecification, TrueSpecification};

class SpecificationBuilderTest extends TestCase
{
    public function testCanBeInstantiatedWithSpecification(): void
    {
        self::assertInstanceOf(SpecificationBuilder::class, new SpecificationBuilder(new TrueSpecification()));
    }

    public function testCanAndTwoSpecificationsTogether(): void
    {
        $spec = (new SpecificationBuilder(new TrueSpecification()))
            ->and(new FalseSpecification());

        self::assertFalse($spec->isSatisfiedBy(new stdClass));

        $spec = (new SpecificationBuilder(new TrueSpecification()))
            ->and(new TrueSpecification());

        self::assertTrue($spec->isSatisfiedBy(new stdClass));
    }

    public function testCanOrTwoSpecificationsTogether(): void
    {
        $spec = (new SpecificationBuilder(new FalseSpecification()))
            ->or(new TrueSpecification());

        self::assertTrue($spec->isSatisfiedBy(new stdClass));

        $spec = (new SpecificationBuilder(new FalseSpecification()))
            ->or(new FalseSpecification());

        self::assertFalse($spec->isSatisfiedBy(new stdClass));
    }

    public function testCanHandleMultipleLogic(): void
    {
        // (1 or 0) and 1
        $spec = (new SpecificationBuilder(new FalseSpecification()))
            ->or(new TrueSpecification())
            ->and(new TrueSpecification());

        self::assertTrue($spec->isSatisfiedBy(new stdClass));

        // (0 and 1) or 1
        $spec = (new SpecificationBuilder(new FalseSpecification()))
            ->and(new TrueSpecification())
            ->or(new TrueSpecification());

        self::assertTrue($spec->isSatisfiedBy(new stdClass));
    }
}
