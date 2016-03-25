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

namespace SR\Doctrine\ORM\Manager;

use SR\Doctrine\ORM\Mapping\Entity;
use SR\Doctrine\ORM\Repository\EntityRepository;

/**
 * Class EntityManager.
 */
class EntityManager implements EntityManagerInterface
{
    /**
     * @return EntityRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $entityName;

    /**
     * @var Entity
     */
    protected $entityTemp;

    /**
     * @param EntityRepository $repository
     * @param string           $entityName
     */
    public function __construct(EntityRepository $repository, $entityName)
    {
        $this->repository = $repository;
        $this->entityName = $entityName;
    }

    /**
     * @return EntityRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->entityName;
    }

    /**
     * @param bool $new
     *
     * @return Entity
     */
    public function getTemp($new = false)
    {
        if (false === ($this->entityTemp instanceof Entity) || true === $new) {
            $entityName = $this->getName();
            $this->entityTemp = new $entityName();
        }

        return $this->entityTemp;
    }
}

/* EOF */
