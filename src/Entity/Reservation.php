<?php

namespace App\Entity;

use App\Controller\ReservationController;
use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Type;
use ApiPlatform\Core\Serializer\Filter\GroupFilter;
use ApiPlatform\Core\Annotation\ApiFilter;

/**
 * @ApiResource(normalizationContext={"groups"={"reservation:read"}},
 *     denormalizationContext={"groups"={"reservation:write"}},
 * collectionOperations={
 *    "get",
 *    "post"={
 *          "security"="is_granted('ROLE_USER')",
 *          "controller"=ReservationController::class,
 *          "security_message"="Only users can add reservation"
 *      }
 * },
 * itemOperations={
 *     "get"={
 *          "security"="object.getUser() == user or object.getProperty().getUser() == user",
 *          "security_message"="Only the owner of the proprio of the bien can see this"
 *     },
 *     "put"={"security"="is_granted('ROLE_PROPRIO')", "denormalization_context"={"groups"={"admin:write"}}},
 * }
 * )
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\GreaterThan("today")
     * @Assert\Type("\DateTimeInterface")
     * @Groups({"reservation:read", "reservation:write"})
     */
    private $dateStart;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\GreaterThan("today")
     * @Assert\Type("\DateTimeInterface")
     * @Groups({"reservation:read", "reservation:write"})
     */
    private $dateEnd;

    /**
     * @ORM\Column(type="float")
     * @Assert\Positive
     * @Groups({"reservation:read", "reservation:write"})
     */
    private $montant;
    
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Groups({"reservation:read", "reservation:write"})
     */
    private $numberTraveler;
    
    /**
     * @var User
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     * @Assert\NotNull
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"reservation:read", "reservation:write"})
     */
    private $user;
    
    /**
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     * @Groups({"reservation:read", "reservation:write", "property:read"})
     */
    private $property;
    
    /**
     * @ORM\Column(type="boolean")
     * @Groups({"reservation:read", "reservation:write"})
     */
    private $paid;
    
    /**
     * @ORM\Column(type="json")
     * @Groups({"reservation:read", "reservation:write"})
     */
    private $proprietes = [];
    
    /**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="reservation")
     * @Groups("reservation:read")
     */
    private $comments;
    
    /**
     * @ORM\Column(type="json")
     * @Groups({"reservation:read", "reservation:write"})
     */
    private $historical = [];
    
    /**
     * @Groups({"reservation:read"})
     * @Assert\Choice({"en attente", "payee", "rejetee"})
     * @ORM\Column(type="string", length=20)
     */
    private $status;
    
    /**
     * @Groups({"reservation:read", "reservation:write"})
     * @Assert\NotNull
     * @ORM\Column(type="string", length=255)
     */
    private $stripeToken;
    
    /**
     * @Groups({"reservation:read", "reservation:write", "paiement:write"})
     * @ORM\OneToMany(targetEntity=Paiement::class, mappedBy="reservation", orphanRemoval=true, cascade={"persist"})
     */
    private $paiements;
    
    public function __construct()
    {
        $this->status="en attente";
        $this->paid = false;
        $this->comments = new ArrayCollection();
        $this->paiements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getdateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setdateStart(\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getNumberTraveler(): ?int
    {
        return $this->numberTraveler;
    }

    public function setNumberTraveler(int $numberTraveler): self
    {
        $this->numberTraveler = $numberTraveler;

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

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(?Property $property): self
    {
        $this->property = $property;

        return $this;
    }

    public function getPaid(): ?bool
    {
        return $this->paid;
    }

    public function setPaid(bool $paid): self
    {
        $this->paid = $paid;

        return $this;
    }

    public function getProprietes(): ?array
    {
        return $this->proprietes;
    }

    public function setProprietes(array $proprietes): self
    {
        $this->proprietes = $proprietes;

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setReservation($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getReservation() === $this) {
                $comment->setReservation(null);
            }
        }

        return $this;
    }

    public function getHistorical(): ?array
    {
        return $this->historical;
    }

    public function setHistorical(array $historical): self
    {
        $this->historical = $historical;

        return $this;
    }

    public function getReservation(): ?User
    {
        return $this->reservation;
    }

    public function setReservation(?User $reservation): self
    {
        $this->reservation = $reservation;

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

    public function getStripeToken(): ?string
    {
        return $this->stripeToken;
    }

    public function setStripeToken(string $stripeToken): self
    {
        $this->stripeToken = $stripeToken;

        return $this;
    }

    /**
     * @return Collection|Paiement[]
     */
    public function getPaiements(): Collection
    {
        return $this->paiements;
    }

    public function addPaiement(Paiement $paiement): self
    {
        if (!$this->paiements->contains($paiement)) {
            $this->paiements[] = $paiement;
            $paiement->setReservation($this);
        }

        return $this;
    }

    public function removePaiement(Paiement $paiement): self
    {
        if ($this->paiements->removeElement($paiement)) {
            // set the owning side to null (unless already changed)
            if ($paiement->getReservation() === $this) {
                $paiement->setReservation(null);
            }
        }

        return $this;
    }
}
