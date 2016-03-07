<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\Tests\ORM\Mapping\Lifecycle;

use Scribe\Wonka\Utility\UnitTest\WonkaTestCase;

/**
 * Class EntityLifecycleTraitTest.
 */
class EntityLifecycleTraitTest extends WonkaTestCase
{
    public function testCalledHelper()
    {
        $methods = [
            'callOrmPreRemove',
            'callOrmPostRemove',
            'callOrmPrePersist',
            'callOrmPostPersist',
            'callOrmPreUpdate',
            'callOrmPostUpdate',
            'callOrmPostLoad',
        ];

        foreach ($methods as $m) {
            $mock = $this->getMockBuilder('Scribe\\Doctrine\\ORM\\Mapping\\Lifecycle\\EntityLifecycleTrait', [], '', true, true, true, ['callOrmLifecycleEvent'])
                ->getMockForTrait();

            $mock->{$m}();
        }
    }
}

/* EOF */
