<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ValuerStringRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string", length=255)
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
