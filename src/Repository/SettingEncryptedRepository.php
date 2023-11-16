<?php

namespace App\Repository;

use App\Entity\SettingEncrypted;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SettingEncrypted>
 *
 * @method SettingEncrypted|null find($id, $lockMode = null, $lockVersion = null)
 * @method SettingEncrypted|null findOneBy(array $criteria, array $orderBy = null)
 * @method SettingEncrypted[]    findAll()
 * @method SettingEncrypted[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SettingEncryptedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SettingEncrypted::class);
    }


    public function findSettingByKey($key)
    {
        $params['key'] = $key;
        $setting =$this->findOneBy(array('llave'=>$key));
        $arr_setting=[];
        if($setting){
            $arr_setting['llave']=$setting->getLlave();
            $arr_setting['valor']=$setting->getValor();
        }
        return $arr_setting;
    }
//    /**
//     * @return SettingEncrypted[] Returns an array of SettingEncrypted objects
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

//    public function findOneBySomeField($value): ?SettingEncrypted
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
