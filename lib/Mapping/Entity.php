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

use Scribe\Doctrine\Exception\ORMException;
use Scribe\Doctrine\ORM\Mapping\Cast\EntityCastTrait;
use Scribe\Doctrine\ORM\Mapping\Copyable\EntityCopyableTrait;
use Scribe\Doctrine\ORM\Mapping\Debug\EntityDebugTrait;
use Scribe\Doctrine\ORM\Mapping\Equatable\EntityEquatableTrait;
use Scribe\Doctrine\ORM\Mapping\Initialize\EntityInitializeTrait;
use Scribe\Doctrine\ORM\Mapping\Lifecycle\EntityLifecycleTrait;
use Scribe\Doctrine\ORM\Mapping\Serializable\EntitySerializableTrait;

/**
 * Class Entity.
 */
class Entity implements EntityInterface
{
    use EntityCastTrait;
    use EntityCopyableTrait;
    use EntityDebugTrait;
    use EntityEquatableTrait;
    use EntityInitializeTrait;
    use EntityLifecycleTrait;
    use EntitySerializableTrait;

    /**
     * @param bool|true $initialize
     */
    public function __construct($initialize = true)
    {
        if ($initialize) {
            $this->callInitializationMethods();
        }
    }

    /**
     * @return string
     */
    public function getIdentityType()
    {
        return self::IDENTITY_TYPE_NONE;
    }

    /**
     * @return bool
     */
    final public function hasIdentityType()
    {
        $type = $this->getIdentityType();

        return (bool) ($type !== self::IDENTITY_TYPE_NONE && property_exists($this, $type));
    }

    /**
     * @param mixed $identity
     *
     * @throws ORMException
     *
     * @return $this
     */
    final public function setIdentity($identity)
    {
        if (!$this->hasIdentityType()) {
            $this->throwExc(new ORMException('Unable to set identity value.'));
        }

        $this->{$this->getIdentityType()} = $identity;

        return $this;
    }

    /**
     * @throws ORMException
     *
     * @return mixed
     */
    final public function getIdentity()
    {
        if (!$this->hasIdentityType()) {
            $this->throwExc(new ORMException('Unable to get identity value.'));
        }

        return $this->{$this->getIdentityType()};
    }

    /**
     * @return bool
     */
    final public function hasIdentity()
    {
        try {
            return (bool) ($this->getIdentity() !== null);
        } catch (ORMException $exception) {
            return false;
        }
    }

    /**
     * @param ORMException $exception
     *
     * @throws ORMException
     */
    final protected function throwExc(ORMException $exception)
    {
        throw new ORMException('Entity %s: %s', $exception, get_class($this), $exception->getMessage());
    }
}

/* EOF */
