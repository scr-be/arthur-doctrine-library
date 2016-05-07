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
use SR\Doctrine\ORM\Repository\EntityRepository;

/**
 * Class EntityManagerTest.
 */
class EntityManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EntityManager
     */
    protected static $em;

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|EntityRepository
     */
    private function getRepoMock()
    {
        return $this->getMockBuilder('\SR\Doctrine\ORM\Repository\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function setUp()
    {
        self::$em = new EntityManager($this->getRepoMock(), '\SR\Doctrine\ORM\Tests\Manager\Fixture\EntityFixture');
    }

    public function testRepositoryExists()
    {
        $this->assertInstanceOf('SR\\Doctrine\\ORM\\Repository\\EntityRepository', self::$em->getRepository());
    }

    public function testEntityName()
    {
        $this->assertEquals('\SR\Doctrine\ORM\Tests\Manager\Fixture\EntityFixture', self::$em->getName());
    }

    public function testGetTemporaryInstance()
    {
        $instance = self::$em->getTemporaryInstance();
        $this->assertInstanceOf('\SR\Doctrine\ORM\Tests\Manager\Fixture\EntityFixture', $instance);
        $instance->setIdentity(1000);
        $this->assertSame(1000, $instance->getIdentity());
        $instanceTwo = self::$em->getTemporaryInstance();
        $this->assertSame(1000, $instanceTwo->getIdentity());
        $instanceThree = self::$em->getTemporaryInstance(true);
        $this->assertNotEquals(1000, $instanceThree->getIdentity());
    }
}

/* EOF */
