<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Mapping\Debug;

/**
 * Trait EntityDebugTrait.
 */
trait EntityDebugTrait
{
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function __debugInfo()
    {
        return [
            get_object_vars($this),
        ];
    }
}

/* EOF */
