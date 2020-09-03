<?php

namespace Tests\Specification;

use PHPUnit\Framework\TestCase;
use stdClass;
use StrikeLabs\Specification\OrSpecification;
use Tests\{FalseSpecification, TrueSpecification};

class OrSpecificationTest extends TestCase
{
    public function testItWillFailAnEmptyArray(): void
    {
        $spec = new OrSpecification();

        self::assertFalse($spec->isSatisfiedBy(new stdClass));
    }

    public function testItWillHandleASingleElement(): void
    {
        self::assertTrue(
            (new OrSpecification(new TrueSpecification()))
                ->isSatisfiedBy(new stdClass)
        );

        self::assertFalse(
            (new OrSpecification(new FalseSpecification()))
                ->isSatisfiedBy(new stdClass)
        );
    }

    public function testItHandlesMultipleTest(): void
    {
        $spec[] = new TrueSpecification();

        for ($i=0;$i<9;$i++) {
            $spec[] = new FalseSpecification();
        }

        self::assertTrue((new OrSpecification(...$spec))->isSatisfiedBy(new stdClass));

        $spec = [];

        for ($i=0;$i<10;$i++) {
            $spec[] = new FalseSpecification();
        }

        self::assertFalse((new OrSpecification(...$spec))->isSatisfiedBy(new stdClass));
    }
}
