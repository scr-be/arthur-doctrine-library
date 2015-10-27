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
 * Class UuidEntity.
 */
abstract class UuidEntity extends Entity implements UuidEntityInterface
{
    /**
     * @var null|string
     */
    protected $uuid;

    /**
     * @return string
     */
    final public function getIdentityType()
    {
        return self::IDENTITY_TYPE_UUID;
    }

    /**
     * @param null|string $uuid
     *
     * @return $this
     */
    public function setUuid($uuid = null)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return bool
     */
    public function hasUuid()
    {
        return $this->hasIdentity();
    }

    /**
     * @return $this
     */
    public function clearUuid()
    {
        $this->uuid = null;

        return $this;
    }
}

/* EOF */
