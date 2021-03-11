<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ValuerStringRepository;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use function Symfony\Component\String\u;

/**
 * @ApiResource(normaizationContext={"groups"={"valeurString:list"}},
 *   collectionoperations={
 *       "get",
 *       "post"={
 *           "security"="is_granted('IS_AUTHENCTICATED_FULLY')",
 *           }
 *       },
 *   itemOperations={
 *       "get"={
 *            "normalizations_context"={"groups"={"valeurString:list", "read:full:valeurString"}},
 *           },
 *         "put"={
 *            "security"="is_granted('EDIT_VALEUR', object) and object.Author == user"
 *          },
 *        "delete"={
 *           "security"="is_granted('EDIT_VALEUR', object) and object.Author == user"
 *         },
 *      })

 * @ORM\Entity(repositoryClass=ValuerStringRepository::class)
 */
class ValuerString
{
     /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"valeurString:list", "propriete:list", "typeproperty:read", "property:read","property:write"})
     * @ORM\Column(type="string", length=255)
     */
    private $valeur;

    /**
     * @Groups({"valeurString:list", "typeproperty:read", "property:read"})
     * @ORM\ManyToOne(targetEntity=Propriete::class)
     */
    private $name;

    /**
     * @Groups({"valeurString:list", "typeproperty:read", "property:read"})
     * @ORM\ManyToOne(targetEntity=property::class, inversedBy="valeur_string")
     * @ORM\JoinColumn(nullable=false)
     */
    private $property;

 

    

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
