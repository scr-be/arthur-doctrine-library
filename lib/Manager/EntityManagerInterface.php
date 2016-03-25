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

/**
 * Interface EntityManagerInterface.
 */
interface EntityManagerInterface
{
    /**
     * @return \SR\Doctrine\ORM\Repository\EntityRepository
     */
    public function getRepository();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param bool $new
     *
     * @return \SR\Doctrine\ORM\Mapping\Entity
     */
    public function getTemp($new = false);
}

/* EOF */
