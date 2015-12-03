<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\Tests\ORM\Mapping;

use Scribe\Doctrine\ORM\Mapping\EntityInterface;

/**
 * Class UuidEntityTest.
 */
class UuidEntityTest extends AbstractEntityType
{
    /**
     * @var string
     */
    public static $type = EntityInterface::IDENTITY_TYPE_UUID;

    public function setUp()
    {
        parent::setUp();
    }
}

/* EOF */
