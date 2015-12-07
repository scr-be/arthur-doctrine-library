<?php

/*
 * This file is part of the Arthur Doctrine Library.
 *
 * (c) Scribe Inc. <oss@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Repository;

use Doctrine\ORM\EntityRepository as DoctrineEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Scribe\Doctrine\Exception\ORMException;

/**
 * Class EntityRepository.
 */
class EntityRepository extends DoctrineEntityRepository implements EntityRepositoryInterface
{
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
            throw new ORMException($e->getMessage(), null, $e);
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
        for ($i = 0; $i < count($predicates); $i++) {
            if (count($predicates[$i]) === 2) {
                $predicates[$i][] = '=';
            }

            if (count($predicates[$i]) !== 3) {
                continue;
            }

            $whereMethod = ($i === 0 ? 'where' : 'andWhere');
            $whereParam = 'predBldr' . str_pad($i, 2, '0', STR_PAD_LEFT);
            list($column, $constraint, $how) = $predicates[$i];

            $builder->$whereMethod($alias . '.' . $column . ' ' . $how . ' :' . $whereParam);
            $builder->setParameter($whereParam, $constraint);
        }

        return $builder;
    }
}

/* EOF */
