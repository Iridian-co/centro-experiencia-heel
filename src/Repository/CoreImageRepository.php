<?php

namespace App\Repository;

use App\Entity\CoreImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoreImage>
 *
 * @method CoreImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoreImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoreImage[]    findAll()
 * @method CoreImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoreImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoreImage::class);
    }

//    /**
//     * @return CoreImage[] Returns an array of CoreImage objects
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

//    public function findOneBySomeField($value): ?CoreImage
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
