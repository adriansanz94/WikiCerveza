<?php

namespace App\Repository;

use App\Entity\Cerveza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cerveza|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cerveza|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cerveza[]    findAll()
 * @method Cerveza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CervezaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cerveza::class);
    }

    // /**
    //  * @return Cerveza[] Returns an array of Cerveza objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cerveza
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
