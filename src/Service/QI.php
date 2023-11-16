<?php

namespace App\Service;

use App\Entity\Setting;
use Doctrine\Persistence\ManagerRegistry;


class QI
{
    private ManagerRegistry $doctrine;
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getSetting($llave){
        return $this->doctrine->getRepository(Setting::class)->findOneBy(array("llave"=>$llave))->getValor();
    }


}
