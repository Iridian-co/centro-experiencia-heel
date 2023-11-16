<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\SettingRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(paginationEnabled: false,   normalizationContext: ['groups' => ['read']])]
#[ApiFilter(SearchFilter::class, properties: ['llave' =>'exact'])]
#[ORM\Entity(repositoryClass: SettingRepository::class)]
class Setting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("read")]
    private ?string $llave = null;

    #[ORM\Column(length: 255)]
    #[Groups("read")]
    private ?string $valor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return  $this->getLlave() . '';
    }

    public function getLlave(): ?string
    {
        return $this->llave;
    }

    public function setLlave(string $llave): static
    {
        $this->llave = $llave;

        return $this;
    }

    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(string $valor): static
    {
        $this->valor = $valor;

        return $this;
    }
}
