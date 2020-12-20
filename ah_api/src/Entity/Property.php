<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 */
class Property
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     * @Assert\Length(
     * max = 100,
     * maxMessage = "La longueur du titre doit être inférieure à {{ limit }} caractères"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * max = 500,
     * maxMessage = "La longueur de la description doit être inférieure à {{ limit }} caractères"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Positive
     * @Assert\NotNull
     * @Assert\LessThan(300)
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Positive
     * @Assert\NotNull
     * @Assert\LessThan(20)
     */
    private $nbr_room;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     * @Assert\Positive
     * @Assert\NotNull
     * 
     */
    private $rate;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Positive
     * @Assert\NotNull
     * @Assert\LessThan(25)
     */
    private $max_travelers;

      /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank
     */
    private $access_handicap;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     */
    private $water;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank
     */
    private $electricity;

    /**
     * @ORM\ManyToOne(targetEntity=TypeProperty::class, inversedBy="properties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeProperty;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     */
    private $tax;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="property", orphanRemoval=true)
     */
    private $reservations;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="properties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Equipment::class, inversedBy="properties")
     */
    private $equipment;

    /**
     * @ORM\OneToOne(targetEntity=Address::class, inversedBy="property", cascade={"persist", "remove"})
     */
    private $address;


    /**
     * @ORM\OneToOne(targetEntity=Valeur::class, mappedBy="property", cascade={"persist", "remove"})
     */
    private $valeur;

    /**
     * @ORM\OneToMany(targetEntity=Indisponibility::class, mappedBy="property")
     */
    private $indisponibilities;

    /**
     * @ORM\OneToMany(targetEntity=Pictures::class, mappedBy="property")
     */
    private $pictures;


    /**
     * @ORM\ManyToMany(targetEntity=Activities::class, mappedBy="Property")
     */
    private $activities;

    /**
     * @ORM\Column(type="array")
     */
    private $status = [];

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->indisponibilities = new ArrayCollection();
        $this->pictures = new ArrayCollection();
        $this->activities = new ArrayCollection();
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
        return $this->access_handicap;
    }

    public function setAccessHandicap(bool $access_handicap): self
    {
        $this->access_handicap = $access_handicap;

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
        return $this->nbr_room;
    }

    public function setNbrRoom(int $nbr_room): self
    {
        $this->nbr_room = $nbr_room;

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
        return $this->max_travelers;
    }

    public function setMaxTravelers(int $max_travelers): self
    {
        $this->max_travelers = $max_travelers;

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


    public function getValeur(): ?Valeur
    {
        return $this->valeur;
    }

    public function setValeur(Valeur $valeur): self
    {
        $this->valeur = $valeur;

        // set the owning side of the relation if necessary
        if ($valeur->getProperty() !== $this) {
            $valeur->setProperty($this);
        }

        return $this;
    }

    /**
     * @return Collection|Indisponibility[]
     */
    public function getIndisponibilities(): Collection
    {
        return $this->indisponibilities;
    }

    public function addIndisponibility(Indisponibility $indisponibility): self
    {
        if (!$this->indisponibilities->contains($indisponibility)) {
            $this->indisponibilities[] = $indisponibility;
            $indisponibility->addProperty($this);
        }

        return $this;
    }

    public function removeIndisponibility(Indisponibility $indisponibility): self
    {
        if ($this->indisponibilities->removeElement($indisponibility)) {
            $indisponibility->removeProperty($this);
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

    public function getStatus(): ?array
    {
        return $this->status;
    }

    public function setStatus(array $status): self
    {
        $this->status = $status;

        return $this;
    }
}
