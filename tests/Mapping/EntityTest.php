<?php

/*
 * This file is part of the `src-run/arthur-doctrine-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Doctrine\Tests\ORM\Mapping;

use SR\Doctrine\Tests\ORM\Mapping\Fixture\EntityFixture;
use SR\Wonka\Utility\UnitTest\WonkaTestCase;

/**
 * Class EntityTest.
 */
class EntityTest extends WonkaTestCase
{
    /**
     * @var EntityFixture
     */
    public static $entity;

    /**
     * @var EntityFixture
     */
    public static $entityNoInitialize;

    public function setUp()
    {
        self::$entity = new EntityFixture();
        self::$entityNoInitialize = new EntityFixture(false);
    }

    public function testEntityInitialize()
    {
        static::assertEquals('initial-property-one-value', self::$entity->getPropertyOne());
        static::assertNotEquals(['will', 'be', 'overwrote'], self::$entity->getPropertyTwo());
        static::assertEquals(['an', 'initial', 'value'], self::$entity->getPropertyTwo());
        static::assertNotEquals(500, self::$entity->getPropertyThree());
        static::assertEquals('will-not-be-overwrote', self::$entity->getPropertyThree());
        static::assertNotEquals('initial-property-one-value', self::$entityNoInitialize->getPropertyOne());
        static::assertNotEquals(['an', 'initial', 'value'], self::$entityNoInitialize->getPropertyTwo());
    }

    public function testEntityNoIdentity()
    {
        static::assertFalse(self::$entity->hasIdentityType());
        static::assertFalse(self::$entity->hasIdentity());
    }

    public function testEntityNoIdentityGetter()
    {
        $this->setExpectedException('SR\Doctrine\Exception\ORMException');
        self::$entity->getIdentity();
    }

    public function testEntityNoIdentitySetter()
    {
        $this->setExpectedException('SR\Doctrine\Exception\ORMException');
        self::$entity->setIdentity('anything');
    }
}

/* EOF */
