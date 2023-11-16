<?php

namespace App\Repository;

use App\Entity\Texto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Texto>
 *
 * @method Texto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Texto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Texto[]    findAll()
 * @method Texto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Texto::class);
    }

//    /**
//     * @return Texto[] Returns an array of Texto objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Texto
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
