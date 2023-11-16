<?php

namespace App\Repository;

use App\Entity\TextoTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TextoTranslation>
 *
 * @method TextoTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextoTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextoTranslation[]    findAll()
 * @method TextoTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextoTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextoTranslation::class);
    }

//    /**
//     * @return TextoTranslation[] Returns an array of TextoTranslation objects
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

//    public function findOneBySomeField($value): ?TextoTranslation
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
