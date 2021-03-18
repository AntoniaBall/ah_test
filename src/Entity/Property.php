<?php

namespace App\Entity;

use App\Entity\Pictures;
use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\SearchController;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Validator\Constraints\MinimalProperties;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\PropertyController;
use App\Controller\ValidationPropertyController;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;

/**
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"property:read", "enable_max_depth"=true}},
 *     "denormalization_context"={"groups"={"property:write"}},
 * },
 * collectionOperations={
 *    "get",
 *    "post"={
 *          "security"="is_granted('ROLE_PROPRIO') or is_granted('ROLE_ADMIN')"
 *    },
 *    "searchProperties"={"route_name"="search"}
 * 
 * },
 * itemOperations={
 *    "get"={"security"="is_granted('IS_AUTHENTICATED_ANONYMOUSLY') or is_granted('IS_AUTHENTICATED_FULLY')"},
 *    "put"={"security"="object.getUser() == user"},
 *    "patch"={"security"="is_granted('ROLE_ADMIN')", "denormalizationf058a0d7cd87e1584a2f6a4facef7ce02c3f4fabf058a0d7cd87e1584a2f6a4facef7ce02c3f4fab_context"={"groups"={"admin:write"}}},
 *    "delete"={"security"="object.getUser() == user or is_granted('ROLE_ADMIN')"},
 *    "patch"={
 *          "security"="is_granted('ROLE_ADMIN')",
 *          "denormalization_context"={"groups"={"admin:write"}},
 *          "path"="/properties/{id}/status",
 *          "controller"=ValidationPropertyController::class,
 *          "security_message"="Only admin can validate a property"
 *     }
 * },
 * attributes={"pagination_items_per_page"=20}
 * )
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "typeProperty": "exact", "title": "exact", "description": "exact", "equipment":"exact", "user":"exact", "disponibilities":"exact", "address.town":"exact", "activities":"exact", "disponibilities":"exact", "user": "exact", "maxTravelers": "exact"})
 * @ApiFilter(RangeFilter::class, properties={"maxTravelers"})
 * [ApiFilter(DateFilter::class, properties: ['disponibilities'])]
 */
class Property
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"property:read", "property:write", "reservation:read", "typeproperty:read", "user:write", "picture:write", "indisponibility:write", "activities:write"})
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     * @Assert\Length(
     * max = 100,
     * maxMessage = "La longueur du titre doit être inférieure à {{ limit }} caractères"
     * )
     * @Assert\NotNull
     * @Groups({"valeurBool:list"})
     */
    private $title;
    
    /**
     * @Groups({"property:read", "reservation:read", "property:write", "typeproperty:read", "user:write", "picture:write", "disponibility:write","activities:write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * max = 500,
     * maxMessage = "La longueur de la description doit être inférieure à {{ limit }} caractères"
     * )
     */
    private $description;

    /**
     * @Groups({"property:read", "reservation:read", "property:write", "typeproperty:read", "user:write", "picture:write", "disponibility:write","activities:write"})
     * @Assert\Positive(message="this value must be positive")
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Positive
     * @Assert\NotNull
     * @Assert\LessThan(300)
     */
    private $surface;

    /**
     * @Groups({"property:read", "property:write", "reservation:read", "typeproperty:read", "picture:write", "disponibility:write","activities:write"})
     * @ORM\Column(type="integer")
     * @Assert\Positive(message="this value must be positive")
     * @Assert\NotNull
     * @Assert\LessThan(5)
    */
    private $nbrRoom;

    /**
    * @Groups({"property:read", "property:write", "reservation:read", "typeproperty:read", "picture:write", "disponibility:write","activities:write"})
     * @Assert\Positive(message="this value must be positive")
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     * @Assert\Positive
     * @Assert\NotNull
     * 
     */
    private $rate;

    /**
    * @Groups({"property:read", "property:write", "reservation:read", "typeproperty:read", "picture:write", "disponibility:write", "activities:write"})
     * @Assert\Positive(message="this value must be positive")
     * @ORM\Column(type="integer")
     */
    private $maxTravelers;

    /**
    * @Groups({"property:read", "property:write", "typeproperty:read", "picture:write", "disponibility:write", "activities:write"})
     * @ORM\Column(type="boolean")
     */
    private $accessHandicap;

    /**
     * @Groups({"property:read", "property:write", "typeproperty:read", "picture:write", "disponibility:write", "activities:write"})
     * @Assert\NotNull
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     */
    private $water;
    
    /**
    * @Groups({"property:read", "property:write", "typeproperty:read", "picture:write", "disponibility:write", "activities:write"})
     * @Assert\NotNull
     * @ORM\Column(type="boolean")
     * @MinimalProperties
     */
    private $electricity;

    /**
     * @Groups({"property:read", "property:write", "user:write"})
     * @ORM\ManyToOne(targetEntity=TypeProperty::class, inversedBy="properties", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $typeProperty;

    /**
    * @Groups({"property:read", "property:write", "typeproperty:read", "picture:write", "disponibility:write", "activities:write"})
    * @Assert\Positive(message="this value should be positive")
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     */
    private $tax;
    
    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="property", orphanRemoval=true)
     */
    private $reservations;

    /**
     * @Groups({"property:read", "property:write", "user:write", "reservation:read"})
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="properties", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @Groups({"property:read", "property:write", "user:write", "equipment:write"})
     * @ORM\ManyToOne(targetEntity=Equipment::class, inversedBy="properties", cascade={"persist", "remove"})
     * @Assert\Valid
     */
    private $equipment;
    
    /**
     * @Groups({"property:read", "property:write", "user:write", "address:write"})
     * 
     * @Assert\Valid
     * @ORM\OneToOne(targetEntity=Address::class, inversedBy="property", cascade={"persist", "remove"})
     */
    private $address;

    /**
     * @Groups({"property:read", "property:write", "user:write", "disponibility:write", "reservation:read"})
     * @ORM\OneToMany(targetEntity=Disponibility::class, mappedBy="property", cascade={"persist", "remove"})
     */
    private $disponibilities;

    /**
     * @var Pictures|null
     * @Groups({"property:read", "property:write", "user:write", "picture:write"})
     * @ORM\OneToMany(targetEntity=Pictures::class, mappedBy="property", cascade={"persist", "remove"})
     * @ApiProperty(iri="http://schema.org/image")
     */
    private $pictures;

    /**
     * @Groups({"property:read", "property:write", "user:write", "activities:write"})
     * @ORM\ManyToMany(targetEntity=Activities::class, mappedBy="property", cascade={"persist", "remove"})
     */
    private $activities;

    /**
     * @Groups({"property:read", "admin:write", "user:write", "disponibility:write"})
     * @Assert\Type(
     *      type="string",
     *      message="This value must be a string"
     * )
     * 
     * @ApiProperty(security="is_granted('ROLE_PROPRIO')")
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @Groups({"property:read","property:write","valeur:write"})
     * @ORM\OneToMany(targetEntity=Valeur::class, mappedBy="bien", cascade={"persist", "remove"})
     */
    private $valeurs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished;


    public function __construct()
    {
        $this->status="en attente";
        $this->isPublished=false;
        $this->reservations = new ArrayCollection();
        $this->disponibilities = new ArrayCollection();
        $this->pictures = new ArrayCollection();
        $this->activities = new ArrayCollection();
        $this->valeurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAccessHandicap(): ?bool
    {
        return $this->accessHandicap;
    }

    public function setAccessHandicap(bool $accessHandicap): self
    {
        $this->accessHandicap = $accessHandicap;

        return $this;
    }

    public function getWater(): ?string
    {
        return $this->water;
    }

    public function setWater(string $water): self
    {
        $this->water = $water;

        return $this;
    }

    public function getElectricity(): ?bool
    {
        return $this->electricity;
    }

    public function setElectricity(bool $electricity): self
    {
        $this->electricity = $electricity;

        return $this;
    }
    
    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getNbrRoom(): ?int
    {
        return $this->nbrRoom;
    }

    public function setNbrRoom(int $nbrRoom): self
    {
        $this->nbrRoom = $nbrRoom;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(float $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getMaxTravelers(): ?int
    {
        return $this->maxTravelers;
    }

    public function setMaxTravelers(int $maxTravelers): self
    {
        $this->maxTravelers = $maxTravelers;

        return $this;
    }

    public function getTypeProperty(): ?TypeProperty
    {
        return $this->typeProperty;
    }

    public function setTypeProperty(?TypeProperty $typeProperty): self
    {
        $this->typeProperty = $typeProperty;

        return $this;
    }

    public function getTax(): ?float
    {
        return $this->tax;
    }

    public function setTax(float $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setProperty($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getProperty() === $this) {
                $reservation->setProperty(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    public function setEquipment(?Equipment $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }


    /**
     * @return Collection|Disponibility[]
     */
    public function getDisponibilities(): Collection
    {
        return $this->disponibilities;
    }

    public function addDisponibility(Disponibility $disponibility): self
    {
        if (!$this->disponibilities->contains($disponibility)) {
            $this->disponibilities[] = $disponibility;
            $disponibility->setProperty($this);
        }

        return $this;
    }

     public function removeDisponibility(Disponibility $disponibility): self
     {
        if ($this->disponibilities->removeElement($disponibility)) {
            return $this;
        }

        return $this;
    }

    /**
     * @return Collection|Pictures[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Pictures $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setProperty($this);
        }

        return $this;
    }

    public function removePicture(Pictures $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getProperty() === $this) {
                $picture->setProperty(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Activities[]
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activities $activity): self
    {
        if (!$this->activities->contains($activity)) {
            $this->activities[] = $activity;
            $activity->addProperty($this);
        }

        return $this;
    }

    public function removeActivity(Activities $activity): self
    {
        if ($this->activities->removeElement($activity)) {
            $activity->removeProperty($this);
        }

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        
        return $this;
    }

    /**
     * @return Collection|Valeur[]
     */
    public function getValeurs(): Collection
    {
        return $this->valeurs;
    }

    public function addValeur(Valeur $valeur): self
    {
        if (!$this->valeurs->contains($valeur)) {
            $this->valeurs[] = $valeur;
            $valeur->setBien($this);
        }

        return $this;
    }

    public function removeValeur(Valeur $valeur): self
    {
        if ($this->valeurs->removeElement($valeur)) {
            // set the owning side to null (unless already changed)
            if ($valeur->getBien() === $this) {
                $valeur->setBien(null);
            }
        }

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }
}