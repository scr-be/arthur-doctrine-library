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

namespace SR\Doctrine\Base\Entity;

use SR\Doctrine\Exception\ORMException;
use SR\Wonka\Utility\Reflection\ClassReflectionAnalyser;

/**
 * Class EntityBaseTest.
 */
class EntityBaseTest extends AbstractEntityBaseTest
{
    public function testIsCloneSafeNoId()
    {
        $this->setExpectedException(
            'SR\Doctrine\Exception\ORMException',
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
