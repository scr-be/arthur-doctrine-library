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
 * Interface EntityCopyableInterface.
 */
interface EntityCopyableInterface
{
    /**
     * @return void
     */
    public function __clone();

    /**
     * @return bool
     */
    public function isEntityCloneSafe();
}

/* EOF */
