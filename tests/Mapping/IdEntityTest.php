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

namespace SR\Doctrine\Tests\ORM\Mapping;

use SR\Doctrine\ORM\Mapping\EntityInterface;

/**
 * Class IdEntityTest.
 */
class IdEntityTest extends AbstractEntityType
{
    /**
     * @var string
     */
    public static $type = EntityInterface::IDENTITY_TYPE_ID;

    public function setUp()
    {
        parent::setUp();
    }
}

/* EOF */
