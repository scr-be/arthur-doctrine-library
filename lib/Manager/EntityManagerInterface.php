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

use SR\Doctrine\ORM\Repository\EntityRepository;

/**
 * Interface EntityManagerInterface.
 */
interface EntityManagerInterface
{
    /**
     * @param EntityRepository $repository
     * @param string           $entityName
     */
    public function __construct(EntityRepository $repository, $entityName);

    /**
     * @return EntityRepository
     */
    public function getRepository();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param bool $new
     *
     * @return Entity
     */
    public function getTemporaryInstance($forceNewInstance = false);
}

/* EOF */
