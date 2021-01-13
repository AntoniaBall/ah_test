<?php

namespace App\Entity;

use App\Repository\IndisponibilityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Type(
     *     type="datetime",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\GreaterThan("today")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_start;

    /**
     * @Groups({"indisponibility:read", "indisponibility:write"})
     * @Assert\Type(
     *     type="datetime",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_end;

    /**
     * @Groups({"indisponibility:read", "indisponibility:write"})
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="indisponibilities", cascade={"persist"})
     */
    private $property;


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
