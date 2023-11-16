<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CoreImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


#[ApiFilter(OrderFilter::class, properties: ['orden'])]
#[ORM\Entity(repositoryClass: CoreImageRepository::class)]

/**
 * @Vich\Uploadable
 */
class CoreImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["read","minimo","busqueda"])]
    private ?string $image = null;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     */
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime  $updatedAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["read","minimo"])]
    private ?int $orden = 1;

    #[ORM\Column]
    #[Groups(["read","minimo"])]
    private ?bool $visible = true;

    #[ORM\Column(nullable: true)]
    #[Groups(["read","minimo"])]
    private ?bool $principal = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["read","minimo"])]
    private ?string $link = null;


    #[ORM\OneToMany(mappedBy: 'objeto', targetEntity: CoreImageTranslation::class, orphanRemoval: true,cascade: ['persist', 'remove'])]
    #[Groups(["read",'minimo'])]
    private Collection $translations;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $llave = null;


    #[ORM\ManyToOne(inversedBy: 'imagenes')]
    private ?Galeria $galeria = null;

    #[ORM\ManyToOne]
    #[Groups("read")]
    private ?Seccion $seccion = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["read","minimo","busqueda"])]
    private ?string $imagetablet = null;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="imagetablet")
     */
    private ?File $imagetabletFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["read",'minimo',"busqueda"])]
    private ?string $imagemobile = null;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="imagemobile")
     */
    private ?File $imagemobileFile = null;



    public function __construct()
    {

        $this->translations = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function __toString(): string
    {
        return  $this->image.'';
    }


    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }


    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if ($imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(?int $orden): static
    {
        $this->orden = $orden;

        return $this;
    }

    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): static
    {
        $this->visible = $visible;

        return $this;
    }

    public function isPrincipal(): ?bool
    {
        return $this->principal;
    }

    public function setPrincipal(?bool $principal): static
    {
        $this->principal = $principal;

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


    /**
     * @return Collection<int, CoreImageTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(CoreImageTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setObjeto($this);
        }

        return $this;
    }

    public function removeTranslation(CoreImageTranslation $translation): static
    {
        if ($this->translations->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getObjeto() === $this) {
                $translation->setObjeto(null);
            }
        }

        return $this;
    }

    public function getLlave(): ?string
    {
        return $this->llave;
    }

    public function setLlave(?string $llave): static
    {
        $this->llave = $llave;

        return $this;
    }

    public function getGaleria(): ?Galeria
    {
        return $this->galeria;
    }

    public function setGaleria(?Galeria $galeria): static
    {
        $this->galeria = $galeria;

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




    public function getImagetablet(): ?string
    {
        return $this->imagetablet;
    }

    public function setImagetablet(?string $imagetablet): static
    {
        $this->imagetablet = $imagetablet;

        return $this;
    }

    public function setImagetabletFile(?File $imagetabletFile = null): void
    {
        $this->imagetabletFile = $imagetabletFile;

        if ($imagetabletFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime();
        }
    }

    public function getImagetabletFile(): ?File
    {
        return $this->imagetabletFile;
    }

    public function getImagemobile(): ?string
    {
        return $this->imagemobile;
    }

    public function setImagemobile(?string $imagemobile): static
    {
        $this->imagemobile = $imagemobile;

        return $this;
    }

    public function setImagemobileFile(?File $imagemobileFile = null): void
    {
        $this->imagemobileFile = $imagemobileFile;

        if ($imagemobileFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime();
        }
    }

    public function getImagemobileFile(): ?File
    {
        return $this->imagemobileFile;
    }




}
