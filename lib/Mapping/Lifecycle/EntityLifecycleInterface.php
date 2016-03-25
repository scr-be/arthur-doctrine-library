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

namespace SR\Doctrine\ORM\Mapping\Lifecycle;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * Interface EntityLifecycleInterface.
 */
interface EntityLifecycleInterface
{
    /**
     * @var string
     */
    const LIFECYCLE_METHOD_PREFIX = 'orm';

    /**
     * @var string
     */
    const LIFECYCLE_PRE_PERSIST = 'PrePersist';

    /**
     * @var string
     */
    const LIFECYCLE_POST_PERSIST = 'PostPersist';

    /**
     * @var string
     */
    const LIFECYCLE_PRE_REMOVE = 'PreRemove';

    /**
     * @var string
     */
    const LIFECYCLE_POST_REMOVE = 'PostRemove';

    /**
     * @var string
     */
    const LIFECYCLE_PRE_UPDATE = 'PreUpdate';

    /**
     * @var string
     */
    const LIFECYCLE_POST_UPDATE = 'PostUpdate';

    /**
     * @var string
     */
    const LIFECYCLE_POST_LOAD = 'PostLoad';

    /**
     * Event occurs pre-removal of entity.
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    public function callOrmPreRemove(LifecycleEventArgs $eventArgs = null);

    /**
     * Event occurs post-removal of entity.
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    public function callOrmPostRemove(LifecycleEventArgs $eventArgs = null);

    /**
     * Event occurs pre-persist (only initial insert) of entity.
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    public function callOrmPrePersist(LifecycleEventArgs $eventArgs = null);

    /**
     * Event occurs post-persist (only initial insert) of entity.
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    public function callOrmPostPersist(LifecycleEventArgs $eventArgs = null);

    /**
     * Event occurs pre-update of entity.
     *
     * @param null|PreUpdateEventArgs $eventArgs
     */
    public function callOrmPreUpdate(PreUpdateEventArgs $eventArgs = null);

    /**
     * Event occurs post-update of entity.
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    public function callOrmPostUpdate(LifecycleEventArgs $eventArgs = null);

    /**
     * Event occurs after the entity has been loaded into the EntityManager
     * from the DB or after a refresh operation.
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    public function callOrmPostLoad(LifecycleEventArgs $eventArgs = null);
}

/* EOF */
