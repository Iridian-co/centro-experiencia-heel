<?php

namespace App\Repository;

use App\CacheManager\CacheManager;
use App\Entity\Locale;
use App\Entity\Section;
use App\Entity\Texto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * @extends ServiceEntityRepository<Section>
 *
 * @method Section|null find($id, $lockMode = null, $lockVersion = null)
 * @method Section|null findOneBy(array $criteria, array $orderBy = null)
 * @method Section[]    findAll()
 * @method Section[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionRepository extends ServiceEntityRepository
{
    private $cacheManager;
    public function __construct(CacheInterface $cache, ManagerRegistry $registry, private ValidatorInterface $validator)
    {
        parent::__construct($registry, Section::class);
        $this->cacheManager = new CacheManager($cache, $registry);
        $this->register = $registry;
    }

    public function add(Section $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Section $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getSectionsCache($params): array
    {
        $data = $this->cacheManager->getData("getSectionsCache",$params, Section::class, "getSections");
        return $data;
    }

    /**
     * @return Section[] Returns an array of Section objects
     */
    public function getSections()
    {

        $list = $this->createQueryBuilder('s')
            ->select('s.id','s.name')
            ->getQuery()
            ->getArrayResult();
        return $list;
    }

//    /**
//     * @return Section[] Returns an array of Section objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Section
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
