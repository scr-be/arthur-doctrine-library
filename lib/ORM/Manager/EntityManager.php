<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Manager;

use Scribe\Doctrine\ORM\Repository\EntityRepository;

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
     * @param $repository EntityRepository
     */
    public function __construct(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return EntityRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
}

/* EOF */
