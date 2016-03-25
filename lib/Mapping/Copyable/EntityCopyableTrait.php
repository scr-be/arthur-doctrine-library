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

namespace SR\Doctrine\ORM\Mapping\Copyable;

/**
 * Trait EntityCopyableTrait.
 */
trait EntityCopyableTrait
{
    /**
     * @return mixed
     */
    abstract public function hasIdentity();

    /**
     */
    public function __clone()
    {
        if ($this->isEntityCloneSafe()) {
            $this->doEntityCloneSafeOperations();
        }
    }

    /**
     * @return bool
     */
    final public function isEntityCloneSafe()
    {
        return (bool) $this->hasIdentity();
    }

    /**
     * @return mixed
     */
    protected function doEntityCloneSafeOperations()
    {
    }
}

/* EOF */
