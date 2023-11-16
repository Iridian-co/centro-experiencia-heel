<?php

namespace App\Entity;

use App\Repository\TextoBigTranslationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;



#[ORM\Entity(repositoryClass: TextoBigTranslationRepository::class)]
#[UniqueEntity(
    fields: ['locale', 'objeto'],
    errorPath: 'locale',
    message: 'Este Locale ya esta definido para el objeto seleccionado',
)]
class TextoBigTranslation
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
    private ?TextoBig $objeto = null;

    #[ORM\Column(type: Types::TEXT, nullable: false)]
    #[Assert\NotBlank(message: 'Este campo es obligatorio.')]
    #[Groups("read")]
    private ?string $valor = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups("read")]
    private ?string $titulo = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups("read")]
    private ?string $boton = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups("read")]
    private ?string $link = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[Groups("read")]
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

    public function getObjeto(): ?TextoBig
    {
        return $this->objeto;
    }

    public function setObjeto(?TextoBig $objeto): static
    {
        $this->objeto = $objeto;

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

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): static
    {
        $this->titulo = $titulo;

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
