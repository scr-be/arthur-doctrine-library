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

use Scribe\Doctrine\Exception\ORMException;
use Scribe\Wonka\Utility\Reflection\ClassReflectionAnalyser;

/**
 * Class EntityBaseTest.
 */
class EntityBaseTest extends AbstractEntityBaseTest
{
    public function testIsCloneSafeNoId()
    {
        $this->setExpectedException(
            'Scribe\Doctrine\Exception\ORMException',
            'Testing trigger error function'
        );

        $classAnalyzer = new ClassReflectionAnalyser();
        $classAnalyzer->setReflectionClassFromClassInstance($this->entity);
        $reflectionMethod = $classAnalyzer->setMethodPublic('throwExc');

        $exception = new ORMException(
            sprintf('Testing trigger error function')
        );

        $reflectionMethod->invoke($this->entity, $exception);
    }
}

/* EOF */
