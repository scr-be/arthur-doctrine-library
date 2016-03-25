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

namespace SR\Doctrine\Base\Entity;

use SR\Doctrine\ORM\Mapping\Entity;
use SR\Doctrine\ORM\Mapping\IdEntity;
use SR\Doctrine\ORM\Mapping\SlugEntity;
use SR\Doctrine\ORM\Mapping\UuidEntity;
use SR\Wonka\Utility\Reflection\ClassReflectionAnalyser;
use SR\Wonka\Utility\UnitTest\WonkaTestCase;

/**
 * Class AbstractEntityBaseTest.
 */
abstract class AbstractEntityBaseTest extends WonkaTestCase
{
    const ENTITY_FQN = 'SR\Doctrine\ORM\Mapping\Entity';
    const ID_ENTITY_FQN = 'SR\Doctrine\ORM\Mapping\IdEntity';
    const UUID_ENTITY_FQN = 'SR\Doctrine\ORM\Mapping\UuidEntity';
    const SLUG_ENTITY_FQN = 'SR\Doctrine\ORM\Mapping\SlugEntity';

    /**
     * @var ClassReflectionAnalyser
     */
    protected $entityReflect;

    /**
     * @var Entity
     */
    protected $entity;

    /**
     * @var ClassReflectionAnalyser
     */
    protected $idEntityReflect;

    /**
     * @var IdEntity
     */
    protected $idEntity;

    /**
     * @var ClassReflectionAnalyser
     */
    protected $uuidEntityReflect;

    /**
     * @var UuidEntity
     */
    protected $uuidEntity;

    /**
     * @var ClassReflectionAnalyser
     */
    protected $slugEntityReflect;

    /**
     * @var SlugEntity
     */
    protected $slugEntity;

    public function setUp()
    {
        parent::setUp();

        $this->entity = new Entity();
        $this->entityReflect = new ClassReflectionAnalyser();
        $this->entityReflect->setReflectionClassFromClassInstance($this->entity);

        $this->idEntity = new IdEntity();
        $this->idEntityReflect = new ClassReflectionAnalyser();
        $this->idEntityReflect->setReflectionClassFromClassInstance($this->idEntity);

        $this->uuidEntity = new UuidEntity();
        $this->uuidEntityReflect = new ClassReflectionAnalyser();
        $this->uuidEntityReflect->setReflectionClassFromClassInstance($this->uuidEntity);

        $this->slugEntity = new SlugEntity();
        $this->slugEntityReflect = new ClassReflectionAnalyser();
        $this->slugEntityReflect->setReflectionClassFromClassInstance($this->slugEntity);
    }
}

/* EOF */
