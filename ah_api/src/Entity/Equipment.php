<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"equipment:read"}},
 *     denormalizationContext={"groups"={"equipment:write"}})
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
     * @Groups({"equipment:read", "equipment:write", "property:read"})
     * @ORM\Column(type="boolean")
     * 
     */
    private $pool;

    /**
     * @Groups({"equipment:read", "equipment:write", "property:read"})
     * @ORM\Column(type="boolean")
     */
    private $baignoire;

    /**
     * @Groups({"equipment:read", "equipment:write", "property:read"})
     * @ORM\Column(type="boolean")
     */
    private $jaccuzzi;

    /**
     * @Groups({"equipment:read", "equipment:write", "property:read"})
     * @ORM\Column(type="boolean")
     */
    private $climatiseur;

    /**
     * @Groups({"equipment:read", "equipment:write", "property:read"})
     * @ORM\Column(type="boolean")
     */
    private $chauffage;

    /**
     * @Groups({"equipment:read", "equipment:write", "property:read"})
     * @ORM\Column(type="boolean")
     */
    private $wifi;

    /**
     * @Groups("equipment:read")
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
    /**
     * @Groups({"equipment:write","property:write"})
     */
    public function setPool(bool $pool): self
    {
        $this->pool = $pool;

        return $this;
    }

    public function getBaignoire(): ?bool
    {
        return $this->baignoire;
    }
    /**
     * @Groups({"equipment:write","property:write"})
     */
    public function setBaignoire(bool $baignoire): self
    {
        $this->baignoire = $baignoire;

        return $this;
    }

    public function getjaccuzzi(): ?bool
    {
        return $this->jaccuzzi;
    }
    /**
     * @Groups({"equipment:write","property:write"})
     */
    public function setjaccuzzi(bool $jaccuzzi): self
    {
        $this->jaccuzzi = $jaccuzzi;

        return $this;
    }

    public function getClimatiseur(): ?bool
    {
        return $this->climatiseur;
    }
    /**
     * @Groups({"equipment:write","property:write"})
     */
    public function setClimatiseur(bool $climatiseur): self
    {
        $this->climatiseur = $climatiseur;

        return $this;
    }

    public function getChauffage(): ?bool
    {
        return $this->chauffage;
    }
    /**
     * @Groups({"equipment:write","property:write"})
     */
    public function setChauffage(bool $chauffage): self
    {
        $this->chauffage = $chauffage;

        return $this;
    }

    public function getWifi(): ?bool
    {
        return $this->wifi;
    }
    /**
     * @Groups({"equipment:write","property:write"})
     */
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
