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
 * Class EntityIdentityId.
 */
class IdEntity extends Entity implements IdEntityInterface
{
    /**
     * @var null|int
     */
    protected $id;

    /**
     * @param null|int $id
     *
     * @return $this
     */
    public function setId($id = null)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null|int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function hasId()
    {
        return $this->hasIdentity();
    }

    /**
     * @return $this
     */
    public function clearId()
    {
        $this->id = null;

        return $this;
    }

    /**
     * @return string
     */
    final public function getIdentityType()
    {
        return self::IDENTITY_TYPE_ID;
    }
}

/* EOF */
