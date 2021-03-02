<?php

namespace App\Entity;

use App\Repository\ValeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use function Symfony\Component\String\u;

/**
 * @ApiResource(normaizationContext={"groups"={"valeur:list"}},
    collectionoperations={
        "get",
        "post"={
            "security"="is_granted('EDIT_VALEUR', object)",
            }
        },
    itemOperations={
        "get"={
             "normalizations_context"={"groups"={"valeur:list", "read:full:valeur"}},
            },
          "put"={
             "security"="is_granted('EDIT_VALEUR', object) and object.author == user"
            },
          "delete"={
             "security"="is_granted('EDIT_VALEUR', object) and object.author == user"
            },
        })
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
     * @ORM\Column(type="integer")
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity=Propriete::class)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=property::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $property_id;

   
  
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getName(): ?propriete
    {
        return $this->name;
    }

    public function setName(?propriete $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPropertyId(): ?property
    {
        return $this->property_id;
    }

    public function setPropertyId(?property $property_id): self
    {
        $this->property_id = $property_id;

        return $this;
    }

 

}
