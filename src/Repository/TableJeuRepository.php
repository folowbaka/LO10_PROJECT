<?php

namespace App\Repository;

use App\Entity\TableJeu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TableJeu|null find($id, $lockMode = null, $lockVersion = null)
 * @method TableJeu|null findOneBy(array $criteria, array $orderBy = null)
 * @method TableJeu[]    findAll()
 * @method TableJeu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TableJeuRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TableJeu::class);
    }

//    /**
//     * @return TableJeu[] Returns an array of TableJeu objects
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
    public function findOneBySomeField($value): ?TableJeu
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
