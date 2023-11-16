<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\TextoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(paginationEnabled: false,   normalizationContext: ['groups' => ['read']])]
#[ApiFilter(SearchFilter::class, properties: ['llave' =>'exact'])]
#[ORM\Entity(repositoryClass: TextoRepository::class)]
class Texto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("read")]
    private ?string $llave = null;

    #[ORM\ManyToOne]
    #[Groups("read")]
    private ?Seccion $seccion = null;

    #[ORM\OneToMany(mappedBy: 'objeto', targetEntity: TextoTranslation::class, orphanRemoval: true, cascade: ['persist', 'remove'])]
    #[Groups("read")]
    #[Assert\Count(min: 1,minMessage : "translations no puede ser vacio")]
    private Collection $translations;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    public function __toString()
    {
        if (count($this->getTranslations()) > 0)
            return  $this->getTranslations()[0]->getValor();
        else
            return  $this->getId() . ' ';
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSeccion(): ?Seccion
    {
        return $this->seccion;
    }

    public function setSeccion(?Seccion $seccion): static
    {
        $this->seccion = $seccion;

        return $this;
    }

    /**
     * @return Collection<int, TextoTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(TextoTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setObjeto($this);
        }

        return $this;
    }

    public function removeTranslation(TextoTranslation $translation): static
    {
        if ($this->translations->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getObjeto() === $this) {
                $translation->setObjeto(null);
            }
        }

        return $this;
    }
}
