<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Mapping\Copyable;

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
     * @return void
     */
    final public function __clone()
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
