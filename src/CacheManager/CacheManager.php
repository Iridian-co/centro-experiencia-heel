<?php


namespace App\CacheManager;


use Doctrine\Persistence\ManagerRegistry;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class CacheManager
{
    private  $invalidchars = array("{","}","(",")","/","\\","@","[","]","\"",":");
    private  $expirationTime = 20;
    private  $entityManager;
    public function __construct(private CacheInterface $cache,private ManagerRegistry $doctrine )
    {
        $this->entityManager = $doctrine->getManager();
    }


    public function getData($sufix,$params,$entity,$method){

        $key = $sufix."_". str_replace($this->invalidchars,"",json_encode($params));
        $data = $this->cache->get($key, function(ItemInterface $item) use ($params,$entity,$method) {
            $item->expiresAfter($this->expirationTime);
            //var_dump("miss");
            $repo = $this->entityManager->getRepository($entity);
            $nuevadata = $repo->$method($params);
            return ($nuevadata);
        });
        return $data;
    }
}