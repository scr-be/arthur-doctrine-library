<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Mapping;

/**
 * Interface UuidEntityInterface.
 */
interface UuidEntityInterface extends EntityInterface
{
    /**
     * @param null|string $uuid
     *
     * @return $this
     */
    public function setUuid($uuid = null);

    /**
     * @return null|string
     */
    public function getUuid();

    /**
     * @return bool
     */
    public function hasUuid();

    /**
     * @return $this
     */
    public function clearUuid();
}

/* EOF */
