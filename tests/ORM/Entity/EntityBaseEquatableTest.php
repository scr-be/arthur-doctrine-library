<?php

/*
 * This file is part of the Scribe Mantle Bundle.
 *
 * (c) Scribe Inc. <source@scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\MantleBundle\Tests\Doctrine\Base\Entity;

use Scribe\Doctrine\ORM\Mapping\UuidEntity;

/**
 * Class EntityBaseEquatableTest.
 */
class EntityBaseEquatableTest extends AbstractEntityBaseTest
{
    public function testIsEqualTo()
    {
        static::assertTrue($this->idEntity->isEqualTo($this->idEntity));
    }

    public function testIsEqualToId()
    {
        $reflectionProperty1 = $this->idEntityReflect->setPropertyPublic('id');
        $reflectionProperty1->setValue($this->idEntity, '123');

        $secondBaseEntity = clone $this->idEntity;
        $thirdBaseEntity = clone $this->idEntity;

        $reflectionProperty2 = $this->idEntityReflect->setPropertyPublic('id');
        $reflectionProperty2->setValue($thirdBaseEntity, '456');

        static::assertTrue($this->idEntity->isEqualTo($secondBaseEntity));
        static::assertFalse($this->idEntity->isEqualTo($thirdBaseEntity));
        static::assertTrue($this->idEntity->isEqualToIdentity($secondBaseEntity));
        static::assertFalse($this->idEntity->isEqualToIdentity($thirdBaseEntity));
    }

    public function testIsEqualToMixed()
    {
        $reflectionProperty1 = $this->slugEntityReflect->setPropertyPublic('slug');
        $reflectionProperty1->setValue($this->slugEntity, 'abcdefg');

        $secondBaseEntity = clone $this->slugEntity;
        $thirdBaseEntity = clone $this->slugEntity;
        $forthBaseEntity = new UuidEntity();
        $forthBaseEntity->setUuid('abcdefg');

        $reflectionProperty2 = $this->slugEntityReflect->setPropertyPublic('slug');
        $reflectionProperty2->setValue($thirdBaseEntity, 'xyz');

        static::assertTrue($this->slugEntity->isEqualTo($secondBaseEntity));
        static::assertTrue($this->slugEntity->isEqualToIdentity($secondBaseEntity));
        static::assertFalse($this->slugEntity->isEqualTo($thirdBaseEntity));
        static::assertFalse($this->slugEntity->isEqualToIdentity($thirdBaseEntity));
        static::assertFalse($this->slugEntity->isEqualTo($forthBaseEntity));
        static::assertTrue($this->slugEntity->isEqualToIdentity($forthBaseEntity));
    }
}

/* EOF */
