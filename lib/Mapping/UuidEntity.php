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
 * Class UuidEntity.
 */
class UuidEntity extends Entity implements UuidEntityInterface
{
    /**
     * @var null|string
     */
    protected $uuid;

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

    /**
     * @return string
     */
    final public function getIdentityType()
    {
        return self::IDENTITY_TYPE_UUID;
    }
}

/* EOF */
