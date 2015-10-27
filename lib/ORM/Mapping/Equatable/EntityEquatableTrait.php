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
use Scribe\Doctrine\ORM\Mapping\EntityInterface;
use Scribe\Wonka\Utility\Reflection\ClassReflectionAnalyser;

/**
 * Interface EntityEquatableInterface.
 */
trait EntityEquatableTrait
{
    /**
     * @return mixed
     */
    abstract public function getIdentity();

    /**
     * {@inheritdoc}
     *
     * @param Entity $entity
     *
     * @return bool
     */
    final public function isEqualTo(Entity $entity)
    {
        $reflectionAnalyser = new ClassReflectionAnalyser();

        $comparisonProperties = $reflectionAnalyser
            ->setReflectionClassFromClassInstance($entity)
            ->getProperties(false);

        $selfProperties = $reflectionAnalyser
            ->setReflectionClassFromClassInstance($this)
            ->getProperties(false);

        $resolvePropertyValue = function (\ReflectionProperty &$value, $name, EntityInterface $e) {
            $value->setAccessible(true);
            $value = $value->getValue($e);
        };

        array_walk($comparisonProperties, $resolvePropertyValue, $entity);
        array_walk($selfProperties, $resolvePropertyValue, $this);

        ksort($comparisonProperties);
        ksort($selfProperties);

        return (bool) ($comparisonProperties === $selfProperties);
    }

    /**
     * {@inheritdoc}
     *
     * @param Entity $entity the entity object to check against
     *
     * @return bool
     */
    final public function isEqualToIdentity(Entity $entity)
    {
        if ($this->getIdentity() === null || $entity->getIdentity() === null) {
            return false;
        }

        return (bool) ($this->getIdentity() === $entity->getIdentity());
    }
}

/* EOF */
