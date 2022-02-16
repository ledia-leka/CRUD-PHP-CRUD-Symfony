<?php

namespace App\Repository;

use App\Entity\Scrud;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Scrud|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scrud|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scrud[]    findAll()
 * @method Scrud[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScrudRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scrud::class);
    }

    // /**
    //  * @return Scrud[] Returns an array of Scrud objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Scrud
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
