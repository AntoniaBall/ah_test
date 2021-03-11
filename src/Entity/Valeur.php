<?php

namespace App\Entity;

use App\Repository\ValeurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
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
     * @Groups({"property:read"})
     * @ORM\Column(type="string", length=100)
     */
    private $valeur;
    
    /**
     * @Groups({"property:read"})
     * @ORM\ManyToOne(targetEntity=Propriete::class, inversedBy="valeurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $propriete;
    
    /**
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="valeurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bien;


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

    public function getPropriete(): ?Propriete
    {
        return $this->propriete;
    }

    public function setPropriete(?Propriete $propriete): self
    {
        $this->propriete = $propriete;

        return $this;
    }

    public function getBien(): ?Property
    {
        return $this->bien;
    }

    public function setBien(?Property $bien): self
    {
        $this->bien = $bien;

        return $this;
    }
}
