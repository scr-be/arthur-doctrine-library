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

use SR\Doctrine\ORM\Mapping\Cast\EntityCastInterface;
use SR\Doctrine\ORM\Mapping\Copyable\EntityCopyableInterface;
use SR\Doctrine\ORM\Mapping\Debug\EntityDebugInterface;
use SR\Doctrine\ORM\Mapping\Equatable\EntityEquatableInterface;
use SR\Doctrine\ORM\Mapping\Initialize\EntityInitializeInterface;
use SR\Doctrine\ORM\Mapping\Lifecycle\EntityLifecycleInterface;
use SR\Doctrine\ORM\Mapping\Serializable\EntitySerializableInterface;

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
