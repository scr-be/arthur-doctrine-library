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
 * Class SlugEntityTest.
 */
class SlugEntityTest extends AbstractEntityType
{
    /**
     * @var string
     */
    static public $type = EntityInterface::IDENTITY_TYPE_SLUG;
}

/* EOF */
