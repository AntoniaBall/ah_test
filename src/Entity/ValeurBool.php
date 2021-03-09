<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ValeurBoolRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 *@ApiResource(normaizationContext={"groups"={"valeurBool:list"}},
 *   collectionoperations={
 *       "get",
 *       "post"={
 *           "security"="is_granted('IS_AUTHENCTICATED_FULLY')",
 *           }
 *       },
 *   itemOperations={
 *       "get"={
 *            "normalizations_context"={"groups"={"valeurBool:list", "read:full:valeurBool"}},
 *          },
 *         "put"={
 *            "security"="is_granted('EDIT_VALEUR', object) and object.Author == user"
 *           },
 *         "delete"={
 *            "security"="is_granted('EDIT_VALEUR', object) and object.Author == user"
 *          },
 *      })

 * @ORM\Entity(repositoryClass=ValeurBoolRepository::class)
 */
class ValeurBool
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     
     * @ORM\Column(type="boolean")
     */
    private $Valeur;

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

    public function getValeur(): ?bool
    {
        return $this->Valeur;
    }

    public function setValeur(bool $Valeur): self
    {
        $this->Valeur = $Valeur;

        return $this;
    }

    public function getName(): ?propriete
    {
        return $this->name;
    }

    public function setName(?Propriete $name): self
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
