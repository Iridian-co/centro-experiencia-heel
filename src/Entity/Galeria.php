<?php

namespace App\Entity;


use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\GaleriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
#[ApiResource(paginationEnabled: false,   normalizationContext: ['groups' => ['read']])]
#[ApiFilter(SearchFilter::class, properties: ['llave' =>'exact'])]
#[ORM\Entity(repositoryClass: GaleriaRepository::class)]
class Galeria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("read")]
    private ?string $llave = null;

    #[ORM\OneToMany(mappedBy: 'galeria', targetEntity: CoreImage::class, orphanRemoval: true,cascade: ['persist', 'remove'])]
    #[Groups("read")]
    private Collection $imagenes;

    #[ORM\ManyToOne]
    #[Groups("read")]
    private ?Seccion $seccion = null;

    public function __construct()
    {
        $this->imagenes = new ArrayCollection();
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

    /**
     * @return Collection<int, CoreImage>
     */
    public function getImagenes(): Collection
    {
        return $this->imagenes;
    }

    public function addImagene(CoreImage $imagene): static
    {
        if (!$this->imagenes->contains($imagene)) {
            $this->imagenes->add($imagene);
            $imagene->setGaleria($this);
        }

        return $this;
    }

    public function removeImagene(CoreImage $imagene): static
    {
        if ($this->imagenes->removeElement($imagene)) {
            // set the owning side to null (unless already changed)
            if ($imagene->getGaleria() === $this) {
                $imagene->setGaleria(null);
            }
        }

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


}
