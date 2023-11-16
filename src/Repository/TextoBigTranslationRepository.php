<?php

namespace App\Repository;

use App\Entity\TextoBigTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TextoBigTranslation>
 *
 * @method TextoBigTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextoBigTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextoBigTranslation[]    findAll()
 * @method TextoBigTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextoBigTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextoBigTranslation::class);
    }

//    /**
//     * @return TextoBigTranslation[] Returns an array of TextoBigTranslation objects
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

//    public function findOneBySomeField($value): ?TextoBigTranslation
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
