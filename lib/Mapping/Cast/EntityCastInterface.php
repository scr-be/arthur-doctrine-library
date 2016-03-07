<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Mapping\Cast;

/**
 * Interface EntityCastInterface.
 */
interface EntityCastInterface
{
    /**
     * Returns name of entity with identity value.
     *
     * @return string
     */
    public function __toString();

    /**
     * Returns public methods and properties.
     *
     * @return array[]
     */
    public function __toArray();
}

/* EOF */
