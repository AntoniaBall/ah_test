<?php

namespace App\Entity;

use App\Repository\ProprieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
    normaizationContext={"groups"={"propriete:list"}},
    collectionoperations={
        "get",
        "post"={
            "security"="is_granted('EDIT_PROPERTY', object)",
            }
        },
    itemOperations={
        "get"={
            "normalizations_context"={"groups"={"propriete:list", "read:full:propriete"}},
            },
    "put"={
        "security"="is_granted('EDIT_PROPERTY', object)"
    },
    "delete"={
        "security"="is_granted('EDIT_PROPERTY', object)"
    },
        }
 )
 * @ORM\Entity(repositoryClass=ProprieteRepository::class)
 */
class Propriete
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"propriete:list"})
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

   
    /**
     * @Groups("propriete:list")
     * @ORM\ManyToOne(targetEntity=typeproperty::class, inversedBy="proprietes")
     */
    private $typeProperty;

    /**
     * @ORM\Column(type="string")
     */
    private $type ;

    

    public function __construct()
    {
        $this->proprieteTypeProperties = new ArrayCollection();
        $this->valeurBools = new ArrayCollection();
        $this->valuerStrings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

  

    public function getTypeProperty(): ?typeproperty
    {
        return $this->typeProperty;
    }

    public function setTypeProperty(?typeproperty $typeProperty): self
    {
        $this->typeProperty = $typeProperty;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(array $type): self
    {
        $this->type = $type;

        return $this;
    }

}
