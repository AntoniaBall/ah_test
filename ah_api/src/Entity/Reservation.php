<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Type;
/**
 * @ApiResource(normalizationContext={"groups"={"reservation:read"}},
 *     denormalizationContext={"groups"={"reservation:write"}})
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 * collectionOperations={
 *    "get",
 *    "post"={"security"="is_granted('ROLE_USER')"}
 * }
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
     * @Assert\NotBlank
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("reservation:read")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups("reservation:read")
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
     * Assert\Choice({"en attente", "payée", "rejetée"})
     * @ORM\Column(type="string", length=20)
     */
    private $status;

    public function __construct()
    {
        $this->status="en attente";
        $this->paid = false;
        $this->setUser($this->getUser());
        $this->comments = new ArrayCollection();
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
}
