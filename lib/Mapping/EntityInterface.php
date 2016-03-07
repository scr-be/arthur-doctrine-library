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

use Scribe\Doctrine\ORM\Mapping\Cast\EntityCastInterface;
use Scribe\Doctrine\ORM\Mapping\Copyable\EntityCopyableInterface;
use Scribe\Doctrine\ORM\Mapping\Debug\EntityDebugInterface;
use Scribe\Doctrine\ORM\Mapping\Equatable\EntityEquatableInterface;
use Scribe\Doctrine\ORM\Mapping\Initialize\EntityInitializeInterface;
use Scribe\Doctrine\ORM\Mapping\Lifecycle\EntityLifecycleInterface;
use Scribe\Doctrine\ORM\Mapping\Serializable\EntitySerializableInterface;

/**
 * Interface EntityInterface.
 */
interface EntityInterface extends EntityCastInterface, EntityCopyableInterface, EntityDebugInterface,
                                  EntityEquatableInterface, EntityInitializeInterface, EntityLifecycleInterface,
                                  EntitySerializableInterface
{
    /**
     * @var string
     */
    const IDENTITY_TYPE_NONE = 'none';

    /**
     * @var string
     */
    const IDENTITY_TYPE_ID = 'id';

    /**
     * @var string
     */
    const IDENTITY_TYPE_UUID = 'uuid';

    /**
     * @var string
     */
    const IDENTITY_TYPE_SLUG = 'slug';

    /**
     * @return string
     */
    public function getIdentityType();

    /**
     * @param mixed $identity
     *
     * @return $this
     */
    public function setIdentity($identity);

    /**
     * @return mixed
     */
    public function getIdentity();

    /**
     * @return bool
     */
    public function hasIdentity();
}

/* EOF */
