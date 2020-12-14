<?php

namespace App\Entity;

use App\Repository\ProprieteTypePropertyRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProprieteTypePropertyRepository::class)
 */
class ProprieteTypeProperty
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Propriete::class, inversedBy="proprieteTypeProperties")
     */
    private $propriete;

    /**
     * @ORM\ManyToOne(targetEntity=TypeProperty::class, inversedBy="proprieteTypeProperties")
     */
    private $type_property;

    /**
     * @ORM\ManyToOne(targetEntity=Valeur::class, inversedBy="proprieteTypeProperties")
     */
    private $valeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPropriete(): ?Propriete
    {
        return $this->propriete;
    }

    public function setPropriete(?Propriete $propriete): self
    {
        $this->propriete = $propriete;

        return $this;
    }

    public function getTypeProperty(): ?TypeProperty
    {
        return $this->type_property;
    }

    public function setTypeProperty(?TypeProperty $type_property): self
    {
        $this->type_property = $type_property;

        return $this;
    }

    public function getValeur(): ?Valeur
    {
        return $this->valeur;
    }

    public function setValeur(?Valeur $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }
}
