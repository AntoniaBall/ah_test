<?php

namespace App\Entity;

use App\Repository\IndisponibilityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ApiResource(normalizationContext={"groups"={"indisponibility:read"}},
 *     denormalizationContext={"groups"={"indisponibility:write"}})
 * @ORM\Entity(repositoryClass=IndisponibilityRepository::class)
 */
class Indisponibility
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"indisponibility:read", "indisponibility:write"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_start;

    /**
     * @Groups({"indisponibility:read", "indisponibility:write"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_end;

    /**
     * @Groups("indisponibility:read")
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="indisponibilities")
     */
    private $property;

    public function __construct()
    {
        $this->property = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(?\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(?\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    /**
     * @return Collection|Property[]
     */
    public function getProperty(): Collection
    {
        return $this->property;
    }

    public function addProperty(Property $property): self
    {
        if (!$this->property->contains($property)) {
            $this->property[] = $property;
        }

        return $this;
    }

    public function removeProperty(Property $property): self
    {
        $this->property->removeElement($property);

        return $this;
    }
}
