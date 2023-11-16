<?php

namespace App\Repository;

use App\Entity\TextoBig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TextoBig>
 *
 * @method TextoBig|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextoBig|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextoBig[]    findAll()
 * @method TextoBig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextoBigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextoBig::class);
    }

    public function getTexto($key,$locale = 'es')
    {
        $query = $this->createQueryBuilder('t')
            ->leftJoin('t.translations', 'tr')
            ->leftJoin('tr.locale', 'l')

            ->select('t.llave', 'tr.valor');

        $query->where('t.llave = :key')
            ->andWhere('l.locale = :locale')
            ->setParameter('key', $key)
            ->setParameter('locale', $locale);


        $texto = $query->orderBy('t.id', 'desc')
            ->groupBy('t.id')
            ->getQuery()
            ->getOneOrNullResult();


        return $texto;
    }

//    /**
//     * @return TextoBig[] Returns an array of TextoBig objects
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

//    public function findOneBySomeField($value): ?TextoBig
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
