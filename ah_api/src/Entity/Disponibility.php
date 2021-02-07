<?php

namespace App\Entity;

use App\Repository\DisponibilityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(normalizationContext={"groups"={"disponibility:read"}},
 *     denormalizationContext={"groups"={"disponibility:write"}})
 * @ORM\Entity(repositoryClass=DisponibilityRepository::class)
 */
class Disponibility
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"disponibility:read", "disponibility:write", "property:write"})
     * @Assert\Type(
     *     type="datetime",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\GreaterThan("today")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateStart;

    /**
     * @Groups({"disponibility:read", "disponibility:write", "property:write"})
     * @Assert\Type(
     *     type="datetime",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateEnd;

    /**
     * @Groups("disponibility:read")
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="disponibilities", cascade={"persist"})
     */
    private $property;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(?\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(?\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get the value of property
     */ 
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Set the value of property
     *
     * @return  self
     */ 
    public function setProperty($property)
    {
        $this->property = $property;

        return $this;
    }
}
