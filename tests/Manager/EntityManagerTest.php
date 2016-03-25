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

namespace SR\Doctrine\Tests\Doctrine\ORM\Manager;

use SR\Doctrine\ORM\Manager\EntityManager;
use SR\Wonka\Utility\UnitTest\WonkaTestCase;

/**
 * Class EntityManagerTest.
 */
class EntityManagerTest extends WonkaTestCase
{
    /**
     * @var EntityManager
     */
    protected static $em;

    public function setUp()
    {
        $repo = $this->getMockBuilder('\\SR\\Doctrine\\ORM\\Repository\\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();

        self::$em = new EntityManager($repo, 'EntityName');
    }

    public function testRepositoryExists()
    {
        static::assertInstanceOf('SR\\Doctrine\\ORM\\Repository\\EntityRepository', self::$em->getRepository());
    }

    public function testEntityName()
    {
        static::assertEquals('EntityName', self::$em->getName());
    }
}

/* EOF */
