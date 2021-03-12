<?php

namespace App\Entity;

use App\Repository\ValeurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"valeur:read", "enable_max_depth"=true}},
 *     "denormalization_context"={"groups"={"valeur:write"}}
 * })
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
     * @Groups({"property:read", "property:write"})
     * @ORM\ManyToOne(targetEntity=Propriete::class, inversedBy="values")
     * @ORM\JoinColumn(nullable=false)
     */
    private $propriete;

    /**
     * @Groups({"property:read", "property:write"})
     * @ORM\Column(type="string", length=100)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="values")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bien;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        // dump((bool)"0");
        if ($this->propriete->getType() === "booleen"){
            dump("booleen");
            dump((bool)$value);
            $this->value = (bool)$value;
        }
        
        if ($this->propriete->getType() === "integer"){
            dump("integer");
            $this->value = (int)$value;
        }

        if ($this->propriete->getType() === "string"){
            $this->value = $value;
        }


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
