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

namespace SR\Doctrine\Tests\ORM\Mapping\Lifecycle;

use SR\Wonka\Utility\UnitTest\WonkaTestCase;

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
            $mock = $this->getMockBuilder('SR\\Doctrine\\ORM\\Mapping\\Lifecycle\\EntityLifecycleTrait', [], '', true, true, true, ['callOrmLifecycleEvent'])
                ->getMockForTrait();

            $mock->{$m}();
        }
    }
}

/* EOF */
