<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\Tests\ORM\Mapping\Fixture;

/**
 * Class EntityFixtureTrait.
 */
trait EntityFixtureTrait
{
    protected $propertyOne;

    protected $propertyTwo = ['will', 'be', 'overwrote'];

    protected $propertyThree = 'will-not-be-overwrote';

    protected function initializePropertyOne()
    {
        $this->propertyOne = 'initial-property-one-value';
    }

    protected function initializePropertyTwo()
    {
        $this->propertyTwo = ['an', 'initial', 'value'];
    }

    protected function badInitializeMethodNameForPropertyThree()
    {
        $this->propertyThree = 500;
    }

    public function getPropertyOne()
    {
        return $this->propertyOne;
    }

    public function getPropertyTwo()
    {
        return $this->propertyTwo;
    }

    public function getPropertyThree()
    {
        return $this->propertyThree;
    }
}

/* EOF */
