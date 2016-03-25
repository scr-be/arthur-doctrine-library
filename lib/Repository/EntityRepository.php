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

namespace SR\Doctrine\ORM\Repository;

use Doctrine\ORM\Cache;
use Doctrine\ORM\EntityRepository as DoctrineEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use SR\Doctrine\Exception\ORMException;

/**
 * Class EntityRepository.
 */
class EntityRepository extends DoctrineEntityRepository implements EntityRepositoryInterface
{
    public function findOneFreshBy(array $predicates)
    {
        $builder = $this
            ->createQueryBuilder('e');

        $builder = $this->addPredicatesToBuilder('e', $builder, $predicates);

        $builder
            ->setCacheMode(Cache::MODE_REFRESH)
            ->setCacheable(false);

        $query = $builder->getQuery();
        $query
            ->setHint(Query::HINT_REFRESH_ENTITY, true)
            ->setHint(Query::HINT_REFRESH, true)
            ->setHint(Query::HINT_CACHE_ENABLED, false)
            ->setHint(Query::HINT_CACHE_EVICT, true);

        return $query->getOneOrNullResult();
    }

    /**
     * @param array $predicates
     *
     * @throws \Exception
     *
     * @return int
     */
    public function getCount(array $predicates = [])
    {
        $builder = $this
            ->createQueryBuilder('e')
            ->select('count(*)');

        $builder = $this->addPredicatesToBuilder('e', $builder, $predicates);

        $query = $builder->getQuery();

        try {
            return (int) $query->getSingleScalarResult();
        } catch (\Exception $e) {
            throw new ORMException($e->getMessage(), $e);
        }
    }

    /**
     * @param string       $alias
     * @param QueryBuilder $builder
     * @param array        $predicates
     *
     * @return QueryBuilder
     */
    public function addPredicatesToBuilder($alias, QueryBuilder $builder, array $predicates = [])
    {
        $i = 0;

        foreach ($predicates as $name => $value) {
            $method = ($i === 0 ? 'where' : 'andWhere');
            $builder->{$method}("$alias.$name = :$name");
            $builder->setParameter($name, $value);
        }

        return $builder;
    }
}

/* EOF */
