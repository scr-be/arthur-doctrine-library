<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Mapping\Equatable;

use Scribe\Doctrine\ORM\Mapping\Entity;

/**
 * Interface EntityEquatableInterface.
 */
interface EntityEquatableInterface
{
    /**
     * Simple check to see if the passed Entity is of the same type as the
     * current object using {@see get_class()} or a similar method.
     *
     * @param Entity $entity
     *
     * @return bool
     */
    public function isEqualTo(Entity $entity);

    /**
     * Check to see if the passed Entity object has the same orm-specified
     * {@see $this->id} value as the current object. This should not allow a
     * comparison of two null id values to return true.
     *
     * @param Entity $entity the entity object to check against
     *
     * @return bool
     */
    public function isEqualToIdentity(Entity $entity);
}

/* EOF */
