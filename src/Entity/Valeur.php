<?php

namespace App\Entity;

use App\Repository\ValeurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\SerializedName;
use App\EventListener\PropertyValeurListener;

/**
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"valeur:read", "enable_max_depth"=true}},
 *     "denormalization_context"={"groups"={"valeur:write"}}
 * })
 * @ORM\Entity(repositoryClass=ValeurRepository::class)
 * @ORM\EntityListeners({"App\EventListener\PropertyValeurListener"})
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
     * @Groups({"property:read", "property:write", "valeur:write"})
     * @ORM\ManyToOne(targetEntity=Propriete::class, inversedBy="valeurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $propriete;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $savedValue;
    
    /**
     * @Groups({"valeur:write"})
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="valeurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bien;

    /**
     * @Groups({"valeur:write", "property:write"})
     */ 
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }
    

    public function getSavedValue()
    {
        if ($this->propriete->getType() === "integer"){
            return \intval($this->savedValue);
        }
        if ($this->propriete->getType() === "string"){
            return $this->savedValue;
        }
        if ($this->propriete->getType() === "boolean"){
            return filter_var($this->savedValue, FILTER_VALIDATE_BOOLEAN);
        }
    }

    public function setSavedValue($value): self
    {
        $this->savedValue = $value;

        return $this;
    }

    public function setPropriete(?Propriete $propriete): self
    {
        $this->propriete = $propriete;

        return $this;
    }

    public function getPropriete()
    {
        return  $this->propriete;
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

    public function getValue(){

        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @Groups({"property:read","valeur:read"})
     * @SerializedName("value")
     */
    public function getTestValues(){
        if ($this->getPropriete()->getType() === "integer"){
            return \intval($this->getSavedValue());
        }
        if ($this->getPropriete()->getType() === "boolean"){
            return filter_var($this->getSavedValue(), FILTER_VALIDATE_BOOLEAN);

        }
        if ($this->getPropriete()->getType() === "string"){
            return $this->getSavedValue();
        }
    }
}
