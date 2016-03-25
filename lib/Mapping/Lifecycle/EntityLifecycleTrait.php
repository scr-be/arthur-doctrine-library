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

use Doctrine\Common\EventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Trait EntityLifecycleTrait.
 */
trait EntityLifecycleTrait
{
    /**
     * {@inheritdoc}
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    final public function callOrmPreRemove(LifecycleEventArgs $eventArgs = null)
    {
        $this->callOrmLifecycleEvent(EntityLifecycleInterface::LIFECYCLE_PRE_REMOVE, $eventArgs);
    }

    /**
     * {@inheritdoc}
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    final public function callOrmPostRemove(LifecycleEventArgs $eventArgs = null)
    {
        $this->callOrmLifecycleEvent(EntityLifecycleInterface::LIFECYCLE_POST_REMOVE, $eventArgs);
    }

    /**
     * {@inheritdoc}
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    final public function callOrmPrePersist(LifecycleEventArgs $eventArgs = null)
    {
        $this->callOrmLifecycleEvent(EntityLifecycleInterface::LIFECYCLE_PRE_PERSIST, $eventArgs);
    }

    /**
     * {@inheritdoc}
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    final public function callOrmPostPersist(LifecycleEventArgs $eventArgs = null)
    {
        $this->callOrmLifecycleEvent(EntityLifecycleInterface::LIFECYCLE_POST_PERSIST, $eventArgs);
    }

    /**
     * {@inheritdoc}
     *
     * @param null|PreUpdateEventArgs $eventArgs
     */
    final public function callOrmPreUpdate(PreUpdateEventArgs $eventArgs = null)
    {
        $this->callOrmLifecycleEvent(EntityLifecycleInterface::LIFECYCLE_PRE_UPDATE, $eventArgs);
    }

    /**
     * {@inheritdoc}
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    final public function callOrmPostUpdate(LifecycleEventArgs $eventArgs = null)
    {
        $this->callOrmLifecycleEvent(EntityLifecycleInterface::LIFECYCLE_POST_UPDATE, $eventArgs);
    }

    /**
     * {@inheritdoc}
     *
     * @param null|LifecycleEventArgs $eventArgs
     */
    final public function callOrmPostLoad(LifecycleEventArgs $eventArgs = null)
    {
        $this->callOrmLifecycleEvent(EntityLifecycleInterface::LIFECYCLE_POST_LOAD, $eventArgs);
    }

    /**
     * Call the requested lifecycle event using method names to filter for type.
     *
     * @param string         $type
     * @param EventArgs|null $eventArgs
     *
     * @return $this
     */
    final protected function callOrmLifecycleEvent($type, EventArgs $eventArgs = null)
    {
        $prefix = EntityLifecycleInterface::LIFECYCLE_METHOD_PREFIX.$type;
        $prefixLength = strlen($prefix);

        array_map(function ($method) use ($prefix, $prefixLength, $eventArgs) {
            if (substr($method, 0, $prefixLength) === $prefix) {
                call_user_func([$this, $method], $eventArgs);
            }
        }, get_class_methods($this));

        return $this;
    }
}

/* EOF */
