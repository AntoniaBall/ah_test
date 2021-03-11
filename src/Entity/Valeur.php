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
 *   collectionoperations={
 *       "get",
 *       "post"={
 *           "security"="is_granted('IS_AUTHENCTICATED_FULLY')",
 *           }
 *       },
 *   itemOperations={
 *       "get"={
 *            "normalizations_context"={"groups"={"valeur:list", "read:full:valeur"}},
 *          },
 *         "put"={
 *            "security"="is_granted('EDIT_VALEUR', object) and object.Author == user"
 *           },
 *         "delete"={
 *            "security"="is_granted('EDIT_VALEUR', object) and object.Author == user"
 *           },
 *       })
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
     * @Groups({"valeur:list", "propriete:list", "typeproperty:read","property:read","property:write"})
     * @ORM\Column(type="integer")
     */
    private $valeur;

    /**
     * @Groups({"valeur:list", "propriete:list", "typeproperty:read","property:read","property:write"})
     * @ORM\ManyToOne(targetEntity=Propriete::class)
     */
    private $name;

   
    /**
     * @Groups({"valeur:list", "typeproperty:read", "property:write"})
     * @ORM\ManyToOne(targetEntity=property::class, inversedBy="valeur_int")
     * @ORM\JoinColumn(nullable=false)
     */
    private $property;


   

    public function __construct()
    {
        $this->proprieteTypeProperties = new ArrayCollection();
    }
    
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
