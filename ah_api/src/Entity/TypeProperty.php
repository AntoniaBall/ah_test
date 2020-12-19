<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypePropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
* @ApiResource()
 * @ORM\Entity(repositoryClass=TypePropertyRepository::class)
 */
class TypeProperty
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Property::class, mappedBy="typeProperty", orphanRemoval=true)
     */
    private $properties;



    /**
     * @ORM\OneToMany(targetEntity=ProprieteTypeProperty::class, mappedBy="type_property")
     */
    private $proprieteTypeProperties;


    public function __construct()
    {
        $this->properties = new ArrayCollection();
        $this->proprieteTypeProperties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
            $proprieteTypeProperty->setTypeProperty($this);
        }

        return $this;
    }

    public function removeProprieteTypeProperty(ProprieteTypeProperty $proprieteTypeProperty): self
    {
        if ($this->proprieteTypeProperties->removeElement($proprieteTypeProperty)) {
            // set the owning side to null (unless already changed)
            if ($proprieteTypeProperty->getTypeProperty() === $this) {
                $proprieteTypeProperty->setTypeProperty(null);
            }
        }

        return $this;
    }

   
}
