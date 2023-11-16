<?php

namespace App\Entity;

use Ambta\DoctrineEncryptBundle\Configuration\Encrypted;
use App\Repository\SettingEncryptedRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SettingEncryptedRepository::class)]
class SettingEncrypted
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Se debe ingresar el nombre')]
    private ?string $llave = null;

    #[ORM\Column(length: 255)]
    #[Encrypted]
    #[Assert\NotBlank(message: 'Se debe ingresar el valor')]
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
