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
 * Interface SlugEntityInterface.
 */
interface SlugEntityInterface extends EntityInterface
{
    /**
     * @param string|null $slug
     *
     * @return $this
     */
    public function setSlug($slug = null);

    /**
     * @return string|null
     */
    public function getSlug();

    /**
     * @return bool
     */
    public function hasSlug();

    /**
     * @return $this
     */
    public function clearSlug();
}

/* EOF */
