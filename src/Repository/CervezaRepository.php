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
    public function todasCervezas($offset) : array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        select cerveza.id , cerveza.nombre , cerveza.graduacion , categoria.nombre as categoria, group_concat(etiqueta.nombre separator\', \') as etiquetas
        from cerveza 
        left join categoria 
        on  cerveza.categoria_id = categoria.id 
        left join cerveza_etiqueta 
        on cerveza_id = cerveza.id 
        left join etiqueta 
        on cerveza_etiqueta.etiqueta_id = etiqueta.id 
        group by cerveza.id , cerveza.nombre , cerveza.graduacion , categoria.nombre
        limit 3 offset '.$offset;
        $stmt = $conn->prepare($sql);
        //$stmt->execute(['price' => $price]);
        //$stmt->execute(['offset' => $offset]); TODO hacer consulta preparada
        $stmt->execute();
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
}
