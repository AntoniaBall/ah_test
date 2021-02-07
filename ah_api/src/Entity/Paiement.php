<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"paiement:read"}},
 *     denormalizationContext={"groups"={"paiement:write"}},
 * )
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
class Paiement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"paiement:read", "paiement:write"})
     * @Assert\NotNull
     * @ORM\Column(type="string", length=255)
     */
    private $tokenStripe;
    
    /**
     * @Groups({"paiement:read", "paiement:write"})
     * @Assert\GreaterThan("today")
     * @ORM\Column(type="datetime")
     */
    private $datePaiement;
    
    /**
     * @Groups({"paiement:read", "paiement:write"})
     * @Assert\NotNull
     * @ORM\Column(type="boolean", length=20)
     */
    private $status;
    
    /**
     * @Groups({"paiement:read", "paiement:write"})
     * @Assert\NotNull
     * @ORM\Column(type="string", length=255)
     */
    private $retourStripe;
    
    /**
     * @Groups({"paiement:read", "paiement:write"})
     * @ORM\ManyToOne(targetEntity=Reservation::class, inversedBy="paiements", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservation;
    
    /**
     * @Groups({"paiement:read", "paiement:write"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRetourStripe;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eventId;

    public function __construct()
    {
        $this->status= false;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTokenStripe(): ?string
    {
        return $this->tokenStripe;
    }

    public function setTokenStripe(string $tokenStripe): self
    {
        $this->tokenStripe = $tokenStripe;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->datePaiement;
    }

    public function setDatePaiement(\DateTimeInterface $datePaiement): self
    {
        $this->datePaiement = $datePaiement;

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

    public function getRetourStripe(): ?string
    {
        return $this->retourStripe;
    }

    public function setRetourStripe(string $retourStripe): self
    {
        $this->retourStripe = $retourStripe;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getDateRetourStripe(): ?\DateTimeInterface
    {
        return $this->dateRetourStripe;
    }

    public function setDateRetourStripe(?\DateTimeInterface $dateRetourStripe): self
    {
        $this->dateRetourStripe = $dateRetourStripe;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getEventId(): ?string
    {
        return $this->eventId;
    }

    public function setEventId(string $eventId): self
    {
        $this->eventId = $eventId;

        return $this;
    }
}
