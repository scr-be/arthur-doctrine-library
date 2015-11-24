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
 * Trait EntityCastTrait.
 */
trait EntityCastTrait
{
    /**
     * @return mixed
     */
    abstract public function getIdentity();

    /**
     * @return string
     */
    abstract public function getIdentityType();

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s [%s:%s]', get_class($this), $this->getIdentityType(), (string) ($this->hasIdentity() ? $this->getIdentity() : 'no-identity'));
    }

    /**
     * {@inheritdoc}
     *
     * @return array[]
     */
    public function __toArray()
    {
        return [
            'properties' => (array) get_object_vars($this),
            'methods' => (array) get_class_methods($this)
        ];
    }
}

/* EOF */
