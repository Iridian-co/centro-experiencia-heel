<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CoreImageTranslationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CoreImageTranslationRepository::class)]

class CoreImageTranslation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]

    private ?Locale $locale = null;

    #[ORM\ManyToOne(inversedBy: 'translations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CoreImage $objeto = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["read",'minimo'])]
    private ?string $titulo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(["read",'minimo'])]
    private ?string $descripcion = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["read",'minimo'])]
    private ?string $boton = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["read",'minimo'])]
    private ?string $link = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[Groups(["read",'minimo'])]
    public function getLocal(): ?string
    {
        return $this->locale ? $this->locale->getLocale() : '';
    }

    public function getLocale(): ?Locale
    {
        return $this->locale;
    }

    public function setLocale(?Locale $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    public function getObjeto(): ?CoreImage
    {
        return $this->objeto;
    }

    public function setObjeto(?CoreImage $objeto): static
    {
        $this->objeto = $objeto;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getBoton(): ?string
    {
        return $this->boton;
    }

    public function setBoton(?string $boton): static
    {
        $this->boton = $boton;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }
}
