<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\Tests\Doctrine\ORM\Manager;

use Scribe\Doctrine\ORM\Manager\EntityManager;
use Scribe\Wonka\Utility\UnitTest\WonkaTestCase;

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
        $repo = $this->getMockBuilder('\\Scribe\\Doctrine\\ORM\\Repository\\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();

        self::$em = new EntityManager($repo, 'EntityName');
    }

    public function testRepositoryExists()
    {
        static::assertInstanceOf('Scribe\\Doctrine\\ORM\\Repository\\EntityRepository', self::$em->getRepository());
    }

    public function testEntityName()
    {
        static::assertEquals('EntityName', self::$em->getName());
    }
}

/* EOF */
