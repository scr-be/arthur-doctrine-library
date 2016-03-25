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

use SR\Doctrine\Exception\ORMException;
use SR\Doctrine\ORM\Mapping\Cast\EntityCastTrait;
use SR\Doctrine\ORM\Mapping\Copyable\EntityCopyableTrait;
use SR\Doctrine\ORM\Mapping\Debug\EntityDebugTrait;
use SR\Doctrine\ORM\Mapping\Equatable\EntityEquatableTrait;
use SR\Doctrine\ORM\Mapping\Initialize\EntityInitializeTrait;
use SR\Doctrine\ORM\Mapping\Lifecycle\EntityLifecycleTrait;
use SR\Doctrine\ORM\Mapping\Serializable\EntitySerializableTrait;

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
