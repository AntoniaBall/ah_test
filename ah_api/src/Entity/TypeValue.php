<?php

namespace App\Entity;

use App\Repository\TypeValueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TypeValueRepository::class)
 */
class TypeValue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Propriete::class, mappedBy="typeValue")
     */
    private $Propriete;

    public function __construct()
    {
        $this->Propriete = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Propriete[]
     */
    public function getPropriete(): Collection
    {
        return $this->Propriete;
    }

    public function addPropriete(Propriete $propriete): self
    {
        if (!$this->Propriete->contains($propriete)) {
            $this->Propriete[] = $propriete;
            $propriete->setTypeValue($this);
        }

        return $this;
    }

    public function removePropriete(Propriete $propriete): self
    {
        if ($this->Propriete->removeElement($propriete)) {
            // set the owning side to null (unless already changed)
            if ($propriete->getTypeValue() === $this) {
                $propriete->setTypeValue(null);
            }
        }

        return $this;
    }
}
