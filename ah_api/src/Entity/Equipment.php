<?php

namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 */
class Equipment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pool;

    /**
     * @ORM\Column(type="boolean")
     */
    private $baignoire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $jaccuzzi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $climatiseur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $chauffage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wifi;

    /**
     * @ORM\OneToMany(targetEntity=Property::class, mappedBy="equipment")
     */
    private $properties;

    public function __construct()
    {
        $this->properties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPool(): ?bool
    {
        return $this->pool;
    }

    public function setPool(bool $pool): self
    {
        $this->pool = $pool;

        return $this;
    }

    public function getBaignoire(): ?bool
    {
        return $this->baignoire;
    }

    public function setBaignoire(bool $baignoire): self
    {
        $this->baignoire = $baignoire;

        return $this;
    }

    public function getJaccuzzi(): ?bool
    {
        return $this->jaccuzzi;
    }

    public function setJaccuzzi(bool $jaccuzzi): self
    {
        $this->jaccuzzi = $jaccuzzi;

        return $this;
    }

    public function getClimatiseur(): ?bool
    {
        return $this->climatiseur;
    }

    public function setClimatiseur(bool $climatiseur): self
    {
        $this->climatiseur = $climatiseur;

        return $this;
    }

    public function getChauffage(): ?bool
    {
        return $this->chauffage;
    }

    public function setChauffage(bool $chauffage): self
    {
        $this->chauffage = $chauffage;

        return $this;
    }

    public function getWifi(): ?bool
    {
        return $this->wifi;
    }

    public function setWifi(bool $wifi): self
    {
        $this->wifi = $wifi;

        return $this;
    }

    /**
     * @return Collection|Property[]
     */
    public function getProperties(): Collection
    {
        return $this->properties;
    }

    public function addProperty(Property $property): self
    {
        if (!$this->properties->contains($property)) {
            $this->properties[] = $property;
            $property->setEquipment($this);
        }

        return $this;
    }

    public function removeProperty(Property $property): self
    {
        if ($this->properties->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getEquipment() === $this) {
                $property->setEquipment(null);
            }
        }

        return $this;
    }
}
