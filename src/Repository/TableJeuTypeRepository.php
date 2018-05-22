<?php

namespace App\Repository;

use App\Entity\TableJeuType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TableJeuType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TableJeuType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TableJeuType[]    findAll()
 * @method TableJeuType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TableJeuTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TableJeuType::class);
    }

//    /**
//     * @return TableJeuType[] Returns an array of TableJeuType objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TableJeuType
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
