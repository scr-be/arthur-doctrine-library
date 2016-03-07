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
    abstract public function __toArray();

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function __debugInfo()
    {
        return array_merge(
            [
                'selfClass' => get_class($this),
                'selfClassStatic' => get_called_class(),
                'selfClassParent' => get_parent_class($this),
            ],
            $this->__toArray()
        );
    }
}

/* EOF */
