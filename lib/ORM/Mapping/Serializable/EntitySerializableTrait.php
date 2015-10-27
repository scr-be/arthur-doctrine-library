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
        $properties = (array) array_filter($this->getEntitySerializerProperties(), function ($name) {
            return (bool) property_exists($this, $name);
        }, ARRAY_FILTER_USE_KEY);

        return $this->getEntitySerializerInstance()->getSerialized($properties);
    }

    /**
     * @param string $data
     */
    final public function unserialize($data)
    {
        $properties = (array) $this->getEntitySerializerInstance()->getUnSerialized($data);

        array_map(function ($value, $name) {
            $this->{$name} = $value;
        }, $properties);
    }

    /**
     * @return SerializerInterface
     */
    protected function getEntitySerializerInstance()
    {
        return SerializerFactory::create(SerializerFactory::SERIALIZER_AUTO);
    }

    /**
     * @return string[]
     */
    protected function getEntitySerializerProperties()
    {
        if (!$this->hasIdentityType()) {
            return [];
        }

        return [
            $this->getIdentityType()
        ];
    }
}

/* EOF */
