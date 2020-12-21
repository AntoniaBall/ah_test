<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"adress:read"}},
 *     denormalizationContext={"groups"={"adress:write"}})
 * @ORM\Entity(repositoryClass=AddressRepository::class)
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * 
     * @ORM\Column(type="integer")
     *  @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * 
     * @Assert\Positive
     * @Groups({"adress:read", "adress:write"})
     */
    private $number;

    /**
     * 
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"adress:read", "adress:write"})
     * 
     */
    private $street;

    /**
     * @ORM\Column(type="integer")
     *  
     * @Assert\NotBlank
     * @Assert\NotNull
     * @Assert\Positive
     * @Assert\Length(
     * min = 5,
     * max = 5,
     * exactMessage = "Votre code postal doit être composé de {{limit}} caractères.")
     * @Groups({"adress:read", "adress:write"})
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * min = 5,
     * max = 150,
     * minMessage = "La ville doit être supérieure à {{ limit }} caractères",
     * maxMessage = "La ville doit être inférieure à {{ limit }} caractères"
     * )
     * @Groups({"adress:read", "adress:write"})
     */
    private $town;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     * @Assert\Length(
     * max = 80,
     * maxMessage = "La longueur du champ doit être inférieure à {{ limit }} caractères"
     * )
     * @Groups({"adress:read", "adress:write"})
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * max = 80,
     * maxMessage = "La longueur du champ doit être inférieure à {{ limit }} caractères"
     * )
     * @Assert\Country
     * @Groups({"adress:read", "adress:write"})
     */
    private $country;

    /**
     * @ORM\OneToOne(targetEntity=Property::class, mappedBy="address", cascade={"persist", "remove"})
     */
    private $property;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(int $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(Property $property): self
    {
        $this->property = $property;

        // set the owning side of the relation if necessary
        if ($property->getAddress() !== $this) {
            $property->setAddress($this);
        }

        return $this;
    }
}
