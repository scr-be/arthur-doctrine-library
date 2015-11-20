<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Mapping\Serializable;

use Scribe\Wonka\Serializer\SerializerFactory;
use Scribe\Wonka\Serializer\SerializerInterface;

/**
 * Trait EntitySerializableTrait.
 */
trait EntitySerializableTrait
{
    /**
     * @return string
     */
    abstract public function getIdentityType();

    /**
     * @return string
     */
    abstract public function hasIdentityType();

    /**
     * @return string
     */
    final public function serialize()
    {
        $properties = (array) array_filter($this->getEntitySerializerProperties(), function ($p) {
            return (bool) property_exists($this, $p);
        });

        $mapped = [];
        array_map(function($name) use (&$mapped) {
            $mapped[$name] = $this->{$name};
        }, $properties);

        return SerializerFactory::create()->serializeData($mapped);
    }

    /**
     * @param string $data
     */
    final public function unserialize($data)
    {
        $properties = (array) SerializerFactory::create()->unSerializeData($data);

        array_walk($properties, function ($value, $name) {
            $this->{$name} = $value;
        });
    }

    /**
     * @return string[]
     */
    protected function getEntitySerializerProperties()
    {
        return (array) ($this->hasIdentityType() ? $this->getIdentityType() : []);
    }
}

/* EOF */
