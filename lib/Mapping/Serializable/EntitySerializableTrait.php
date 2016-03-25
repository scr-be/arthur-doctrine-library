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

namespace SR\Doctrine\ORM\Mapping\Serializable;

use SR\Wonka\Serializer\SerializerFactory;

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
     * @return bool
     */
    abstract public function hasIdentityType();

    /**
     * @return bool
     */
    abstract public function hasIdentity();

    /**
     * @return string
     */
    final public function serialize()
    {
        if (!$this->hasIdentity()) {
            return [];
        }

        $properties = (array) array_filter($this->getEntitySerializerProperties(), function ($p) {
            return (bool) property_exists($this, $p);
        });

        $mapped = [];
        array_map(function ($name) use (&$mapped) {
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
