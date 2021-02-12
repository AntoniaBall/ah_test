<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Controller\RegistrationController;

/**
* @ApiResource(normalizationContext={"groups"={"user:read"}},
*     denormalizationContext={"groups"={"user:write"}},
*     collectionOperations={
*           "register"={
*                   "method"="POST",
*                   "path"="/register",
*                   "controller"=RegistrationController::class,
*                   "read"=false
*           }
*     }
*)
* 
* @ORM\Entity(repositoryClass=UserRepository::class)
* @UniqueEntity(fields={"email"}, message="There is already an account with this email")
*/
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("user:read")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Email(
     * message = "The email'{{ value }}' is not a valid email.")
     * 
     * @Groups({"user:read", "user:write", "property:read"})
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string The hashed password
     * @Groups({"user:write"})
     * 
     */
    private $password;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     * @Groups({"user:read", "user:write", "property:read"})
     */
    private $phone;
    
    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="user", orphanRemoval=true)
     * 
     * @Groups({"user:write"})
     * @ORM\Column(type="json")
     */
    private $roles = [];
    
    /*
    * @ORM\Column(type="boolean")
    */
    private $isVerified = false;
    
    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"user:read", "user:write", "property:read"})
     */
    private $firstName;    

     /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"user:read", "user:write", "property:read"})
     */
    private $lastName;  
    
    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="user", orphanRemoval=true)
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity=Property::class, mappedBy="user", orphanRemoval=true, cascade={"persist"})
     * 
     * @Groups("user:read")
     */
    private $properties;

    private UserPasswordEncoderInterface $encoder;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->properties = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->id;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        // $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this; 
    }
    
    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->password = null;
    }
    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Property[]
     */
    public function getProperty(): Collection
    {
        return $this->property;
    }

    // public function addProperty(Property $property): self
    // {
    //     if (!$this->property->contains($property)) {
    //         $this->property[] = $property;
    //         $property->setUserId($this);
    //     }

    //     return $this;
    // }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    // public function removeProperty(Property $property): self
    // {
    //     if ($this->property->removeElement($property)) {
    //         // set the owning side to null (unless already changed)
    //         if ($property->getUserId() === $this) {
    //             $property->setUserId(null);
    //         }
    //     }

    //     return $this;
    // }

    public function getReservation(): ?int
    {
        return $this->reservation;
    }

    public function setReservation(int $reservation): self
    {
        $this->reservation = $reservation;

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
            $reservation->setUser($this);
            $reservation->setReservation($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getUser() === $this) {
                $reservation->setUser(null);
            }
            if ($reservation->getReservation() === $this) {
                $reservation->setReservation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Property[]
     */
    public function getProperties(): Collection
    {
        return $this->properties;
    }

    public function addProperty(Property $property): self
    {
        if (!$this->properties->contains($property)) {
            $this->properties[] = $property;
            $property->setUser($this);
        }

        return $this;
    }

    public function removeProperty(Property $property): self
    {
        if ($this->properties->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getUser() === $this) {
                $property->setUser(null);
            }
        }
    }
    
    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }


    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of firstName
     */ 
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }
}
