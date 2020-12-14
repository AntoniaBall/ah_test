<?php

namespace App\Entity;

use App\Repository\ProprieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProprieteRepository::class)
 */
class Propriete
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_required;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=ProprieteTypeProperty::class, mappedBy="propriete")
     */
    private $proprieteTypeProperties;

    /**
     * @ORM\ManyToOne(targetEntity=TypeValue::class, inversedBy="Propriete")
     */
    private $typeValue;

    public function __construct()
    {
        $this->proprieteTypeProperties = new ArrayCollection();
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIsRequired(): ?bool
    {
        return $this->is_required;
    }

    public function setIsRequired(bool $is_required): self
    {
        $this->is_required = $is_required;

        return $this;
    }


    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|ProprieteTypeProperty[]
     */
    public function getProprieteTypeProperties(): Collection
    {
        return $this->proprieteTypeProperties;
    }

    public function addProprieteTypeProperty(ProprieteTypeProperty $proprieteTypeProperty): self
    {
        if (!$this->proprieteTypeProperties->contains($proprieteTypeProperty)) {
            $this->proprieteTypeProperties[] = $proprieteTypeProperty;
            $proprieteTypeProperty->setPropriete($this);
        }

        return $this;
    }

    public function removeProprieteTypeProperty(ProprieteTypeProperty $proprieteTypeProperty): self
    {
        if ($this->proprieteTypeProperties->removeElement($proprieteTypeProperty)) {
            // set the owning side to null (unless already changed)
            if ($proprieteTypeProperty->getPropriete() === $this) {
                $proprieteTypeProperty->setPropriete(null);
            }
        }

        return $this;
    }

    public function getTypeValue(): ?TypeValue
    {
        return $this->typeValue;
    }

    public function setTypeValue(?TypeValue $typeValue): self
    {
        $this->typeValue = $typeValue;

        return $this;
    }
}
