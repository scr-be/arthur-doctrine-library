<?php

/*
 * This file is part of the Scribe Mantle Bundle.
 *
 * (c) Scribe Inc. <source@scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\Base\Entity;

/**
 * Class EntityBaseCastableTest.
 */
class EntityBaseCastableTest extends AbstractEntityBaseTest
{
    public function testStringCastableOnNoId()
    {
        $expected = self::ENTITY_FQN.' [none:no-identity]';

        static::assertEquals($expected, (string) $this->entity);
    }

    public function testStringCastableWithValidId()
    {
        $reflectionProperty = $this->idEntityReflect->setPropertyPublic('id');
        $reflectionProperty->setValue($this->idEntity, '123');

        $expected = self::ID_ENTITY_FQN.' [id:123]';

        static::assertEquals($expected, (string) $this->idEntity);
        static::assertEquals($expected, (string) $this->idEntity->__toString());
    }

    public function testArrayCastable()
    {
        $expected = [
            'properties' => [],
            'methods' => [
                '__construct',
                'getIdentityType',
                'hasIdentityType',
                'setIdentity',
                'getIdentity',
                'hasIdentity',
                'throwExc',
                '__toString',
                '__toArray',
                '__clone',
                'isEntityCloneSafe',
                '__debugInfo',
                'isEqualTo',
                'isEqualToIdentity',
                'callOrmPreRemove',
                'callOrmPostRemove',
                'callOrmPrePersist',
                'callOrmPostPersist',
                'callOrmPreUpdate',
                'callOrmPostUpdate',
                'callOrmPostLoad',
                'serialize',
                'unserialize',
                'doEntityCloneSafeOperations',
                'callInitializationMethods',
                'callOrmLifecycleEvent',
                'getEntitySerializerProperties',
            ],
        ];

        static::assertEquals($expected, $this->entity->__toArray());
    }
}

/* EOF */
