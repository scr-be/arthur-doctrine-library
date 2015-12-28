<?php

/*
 * This file is part of the Scribe Mantle Bundle.
 *
 * (c) Scribe Inc. <source@scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\Exception;

use Scribe\Wonka\Utility\UnitTest\WonkaTestCase;

/**
 * Class ExceptionTest.
 */
class ExceptionTest extends WonkaTestCase
{
    const CLASS_NAMESPACE = '\\Scribe\\Doctrine\\Exception\\';

    public $exceptionClasses = [
        'ORMAssociationException',
        'ORMDataStateException',
        'ORMException',
        'ORMSubscriberEventException',
        'ORMSubscriberException',
        'ORMTransactionException',
    ];

    public function testExceptions()
    {
        foreach ($this->exceptionClasses as $class) {
            $classFQCN = self::CLASS_NAMESPACE . $class;
            $e = new $classFQCN();

            static::assertNotNull($e->getMessage());
            static::assertNotNull($e->getCode());
        }
    }
}

/* EOF */
