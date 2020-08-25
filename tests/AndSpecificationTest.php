<?php

namespace StrikeLabs\Specification;

use PHPUnit\Framework\TestCase;

class AndSpecificationTest extends TestCase
{
    public function testItWillFailAnEmptyArray(): void
    {
        $spec = new AndSpecification();

        self::assertFalse($spec->isSatisfiedBy(new \stdClass));
    }

    public function testItWillPassASingleElement(): void
    {
        $spec = new TrueSpecification();

        self::assertTrue((new AndSpecification($spec))->isSatisfiedBy(new \stdClass));
    }

    public function testItWillPassMultipleElements(): void
    {
        $spec = [];

        for ($i=0;$i<10;$i++) {
            $spec[] = new TrueSpecification();
        }

        self::assertTrue((new AndSpecification(...$spec))->isSatisfiedBy(new \stdClass));
    }
}
