<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ValeurBoolRepository;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use function Symfony\Component\String\u;


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
     * @Groups({"valeurBool:list", "propriete:list", "typeproperty:read", "property:read","property:write"})
     * @ORM\Column(type="boolean")
     */
    private $Valeur;

    /**
     * @Groups({"valeurBool:list", "typeproperty:read", "property:read"})
     * @ORM\ManyToOne(targetEntity=Propriete::class)
     */
    private $name;
    
    /**
     * @Groups({"valeurBool:list", "typeproperty:read", "property:read"})
     * @ORM\ManyToOne(targetEntity=property::class, inversedBy="valeur_bool")
     * @ORM\JoinColumn(nullable=false)
     */
    private $property;
  


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

    

    public function getProperty(): ?property
    {
        return $this->property;
    }

    public function setProperty(?property $property): self
    {
        $this->property = $property;

        return $this;
    }
   

}
