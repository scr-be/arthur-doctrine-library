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

namespace SR\Doctrine\ORM\Mapping;

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
