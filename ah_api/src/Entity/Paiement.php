<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
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
     * @ORM\Column(type="string", length=255)
     */
    private $tokenStripe;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePaiement;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $retourStripe;

    /**
     * @ORM\ManyToOne(targetEntity=Reservation::class, inversedBy="paiements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRetourStripe;

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
}
