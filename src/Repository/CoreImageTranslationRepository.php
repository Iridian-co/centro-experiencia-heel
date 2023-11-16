<?php

namespace App\Repository;

use App\Entity\CoreImageTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoreImageTranslation>
 *
 * @method CoreImageTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoreImageTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoreImageTranslation[]    findAll()
 * @method CoreImageTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoreImageTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoreImageTranslation::class);
    }

//    /**
//     * @return CoreImageTranslation[] Returns an array of CoreImageTranslation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CoreImageTranslation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
