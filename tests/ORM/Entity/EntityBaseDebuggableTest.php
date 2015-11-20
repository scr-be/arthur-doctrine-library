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

/**
 * Class EntityBaseDebuggableTest.
 */
class EntityBaseDebuggableTest extends AbstractEntityBaseTest
{
    protected $debugExpectedEnd = [
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
    ];

    public function testDebugInfo()
    {
        $expected = [
            'properties' => [],
            'methods' => array_merge(
                [
                    '__construct',
                    'getIdentityType',

                ],
                $this->debugExpectedEnd
            ),
            'selfClass' => self::ENTITY_FQN,
            'selfClassStatic' => self::ENTITY_FQN,
            'selfClassParent' => false,

        ];

        static::assertEquals($expected, $this->entity->__debugInfo());

        $expected = [
            'properties' => [
                'id' => null
            ],
            'methods' => array_merge(
                [
                    'setId',
                    'getId',
                    'hasId',
                    'clearId',
                    'getIdentityType',
                    '__construct',
                ],
                $this->debugExpectedEnd
            ),
            'selfClass' => self::ID_ENTITY_FQN,
            'selfClassStatic' => self::ID_ENTITY_FQN,
            'selfClassParent' => self::ENTITY_FQN,

        ];

        static::assertEquals($expected, $this->idEntity->__debugInfo());

        $expected = [
            'properties' => [
                'uuid' => null
            ],
            'methods' => array_merge(
                [
                    'setUuid',
                    'getUuid',
                    'hasUuid',
                    'clearUuid',
                    'getIdentityType',
                    '__construct',
                ],
                $this->debugExpectedEnd
            ),
            'selfClass' => self::UUID_ENTITY_FQN,
            'selfClassStatic' => self::UUID_ENTITY_FQN,
            'selfClassParent' => self::ENTITY_FQN,

        ];

        static::assertEquals($expected, $this->uuidEntity->__debugInfo());

        $expected = [
            'properties' => [
                'slug' => null
            ],
            'methods' => array_merge(
                [
                    'setSlug',
                    'getSlug',
                    'hasSlug',
                    'clearSlug',
                    'getIdentityType',
                    '__construct',
                ],
                $this->debugExpectedEnd
            ),
            'selfClass' => self::SLUG_ENTITY_FQN,
            'selfClassStatic' => self::SLUG_ENTITY_FQN,
            'selfClassParent' => self::ENTITY_FQN,

        ];

        static::assertEquals($expected, $this->slugEntity->__debugInfo());
    }
}

/* EOF */
