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
 * Interface IdEntityInterface.
 */
interface IdEntityInterface extends EntityInterface
{
    /**
     * @param null|int $id
     *
     * @return $this
     */
    public function setId($id = null);

    /**
     * @return null|int
     */
    public function getId();

    /**
     * @return bool
     */
    public function hasId();

    /**
     * @return $this
     */
    public function clearId();
}

/* EOF */
