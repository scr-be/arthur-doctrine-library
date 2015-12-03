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

        $propNamesOther = $propValuesOther = $reflectionAnalyser
            ->setReflectionClassFromClassInstance($entity)
            ->getProperties(false);

        $propNamesSelf = $propValuesSelf = $reflectionAnalyser
            ->setReflectionClassFromClassInstance($this)
            ->getProperties(false);

        $propsOther = $propsSelf = [];

        foreach ($propNamesOther as $p) {
            $p->setAccessible(true);
            $propsOther[$p->getName()] = $p->getValue($entity);
        }

        foreach ($propNamesSelf as $p) {
            $p->setAccessible(true);
            $propsSelf[$p->getName()] = $p->getValue($this);
        }

        ksort($propsOther);
        ksort($propsSelf);

        return (bool) ($propsOther === $propsSelf);
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
