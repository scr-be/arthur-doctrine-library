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

use Scribe\Doctrine\ORM\Mapping\Entity;

/**
 * Class EntityBaseSerializableTest.
 */
class EntityBaseSerializableTest extends AbstractEntityBaseTest
{
    /**
     * @var Entity
     */
    public $entity;

    public function testIsCloneSafe()
    {
        static::assertFalse($this->idEntity->isEntityCloneSafe());
        static::assertFalse($this->slugEntity->isEntityCloneSafe());
        static::assertFalse($this->uuidEntity->isEntityCloneSafe());

        $entity = $this->idEntityReflect->setPropertyPublic('id');
        $entity->setValue($this->idEntity, 100);
        $entity = $this->slugEntityReflect->setPropertyPublic('slug');
        $entity->setValue($this->slugEntity, 'abcdef');
        $entity = $this->uuidEntityReflect->setPropertyPublic('uuid');
        $entity->setValue($this->uuidEntity, 'uuid');

        static::assertTrue($this->idEntity->isEntityCloneSafe());
        static::assertTrue($this->slugEntity->isEntityCloneSafe());
        static::assertTrue($this->uuidEntity->isEntityCloneSafe());
    }

    public function testIsSerializable()
    {
        $this->idEntity->setId(100);
        $serializedEntity = serialize($this->idEntity);
        $unserializedEntity = unserialize($serializedEntity);

        static::assertTrue($this->idEntity->isEqualToIdentity($unserializedEntity));
    }
}

/* EOF */
