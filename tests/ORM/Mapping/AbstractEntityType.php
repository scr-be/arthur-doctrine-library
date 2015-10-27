<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\Tests\ORM\Mapping;

use Scribe\Doctrine\Tests\ORM\Mapping\Fixture\IdEntityFixture;
use Scribe\Doctrine\Tests\ORM\Mapping\Fixture\SlugEntityFixture;
use Scribe\Doctrine\Tests\ORM\Mapping\Fixture\UuidEntityFixture;
use Scribe\Wonka\Utility\UnitTest\WonkaTestCase;

/**
 * Class AbstractEntityType.
 */
class AbstractEntityType extends WonkaTestCase
{
    /**
     * @var IdEntityFixture|SlugEntityFixture|UuidEntityFixture
     */
    static public $entity;

    /**
     * @var IdEntityFixture|SlugEntityFixture|UuidEntityFixture
     */
    static public $entityNoInitialize;

    /**
     * @var string
     */
    static public $type;

    /**
     * @var string
     */
    public $className;

    public function setUp()
    {
        $this->className = 'Scribe\\Doctrine\\Tests\\ORM\\Mapping\\Fixture\\'.ucfirst(static::$type).'EntityFixture';
        $this->typeGetMethod = 'get'.ucfirst(static::$type);
        $this->typeSetMethod = 'set'.ucfirst(static::$type);
        $this->typeHasMethod = 'has'.ucfirst(static::$type);
        $this->typeClearMethod = 'clear'.ucfirst(static::$type);

        static::$entity = new $this->className();
        static::$entityNoInitialize = new $this->className(false);
    }

    public function testEntityIdentityType()
    {
        static::assertTrue(static::$entity->hasIdentityType());
        static::assertEquals(static::$type, static::$entity->getIdentityType());
    }

    public function testEntityIdentityGetterSetter()
    {
        static::assertFalse(static::$entity->hasIdentity());
        static::assertFalse(call_user_func([static::$entity, $this->typeHasMethod]));
        static::assertNull(static::$entity->getIdentity());
        static::assertNull(call_user_func([static::$entity, $this->typeGetMethod]));
        static::assertInstanceOf($this->className, static::$entity->setIdentity('anything'));
        static::assertNotNull(static::$entity->getIdentity());
        static::assertNotNull(call_user_func([static::$entity, $this->typeGetMethod]));
        static::assertEquals('anything', static::$entity->getIdentity());
        static::assertEquals('anything', call_user_func([static::$entity, $this->typeGetMethod]));
        static::assertInstanceOf($this->className, call_user_func([static::$entity, $this->typeSetMethod], 'something-else'));
        static::assertNotNull(static::$entity->getIdentity());
        static::assertNotNull(call_user_func([static::$entity, $this->typeGetMethod]));
        static::assertEquals('something-else', static::$entity->getIdentity());
        static::assertEquals('something-else', call_user_func([static::$entity, $this->typeGetMethod]));
        static::assertTrue(static::$entity->hasIdentity());
        static::assertTrue(call_user_func([static::$entity, $this->typeHasMethod]));
        static::assertInstanceOf($this->className, call_user_func([static::$entity, $this->typeClearMethod], 'something-else'));
        static::assertFalse(static::$entity->hasIdentity());
        static::assertFalse(call_user_func([static::$entity, $this->typeHasMethod]));
        static::assertNull(static::$entity->getIdentity());
        static::assertNull(call_user_func([static::$entity, $this->typeGetMethod]));
    }
}

/* EOF */
