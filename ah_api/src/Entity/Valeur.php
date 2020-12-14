<?php

namespace App\Entity;

use App\Repository\ValeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ValeurRepository::class)
 */
class Valeur
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
    private $valeur;

    /**
     * @ORM\OneToOne(targetEntity=Property::class, inversedBy="valeur", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $property;


    /**
     * @ORM\OneToMany(targetEntity=ProprieteTypeProperty::class, mappedBy="valeur")
     */
    private $proprieteTypeProperties;

    public function __construct()
    {
        $this->proprieteTypeProperties = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(Property $property): self
    {
        $this->property = $property;

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
            $proprieteTypeProperty->setValeur($this);
        }

        return $this;
    }

    public function removeProprieteTypeProperty(ProprieteTypeProperty $proprieteTypeProperty): self
    {
        if ($this->proprieteTypeProperties->removeElement($proprieteTypeProperty)) {
            // set the owning side to null (unless already changed)
            if ($proprieteTypeProperty->getValeur() === $this) {
                $proprieteTypeProperty->setValeur(null);
            }
        }

        return $this;
    }


}
