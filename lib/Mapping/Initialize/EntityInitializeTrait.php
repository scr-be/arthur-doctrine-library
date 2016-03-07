<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Mapping\Initialize;

/**
 * Trait EntityInitializeTrait.
 */
trait EntityInitializeTrait
{
    /**
     * @return $this
     */
    final protected function callInitializationMethods()
    {
        $prefix = EntityInitializeInterface::INITIALIZE_METHOD_PREFIX;
        $prefixLength = strlen(EntityInitializeInterface::INITIALIZE_METHOD_PREFIX);

        array_map(function ($method) use ($prefix, $prefixLength) {
            if (substr($method, 0, $prefixLength) === $prefix) {
                call_user_func([$this, $method]);
            }
        }, get_class_methods($this));

        return $this;
    }
}

/* EOF */
