<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"comments:read"}},
 *     denormalizationContext={"groups"={"comments:write"}})
 * @ORM\Entity(repositoryClass=CommentsRepository::class)
 */
class Comments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"comments:read", "comments:write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     * @Assert\Length(
     * max = 250,
     * maxMessage = "La longueur du commentaire doit être inférieure à {{ limit }} caractères"
     * )
     * 
     */
    private $comment_content;

    /**
     * 
     * @ORM\OneToMany(targetEntity=Pictures::class, mappedBy="comments")
     * @Groups("comments:read")
     */
    private $pictures;

    /**
     * 
     * @ORM\Column(type="array")
     * @Groups({"comments:read", "comments:write"})
     */
    private $forbidden_words = [];

    /**
     * 
     * @ORM\ManyToOne(targetEntity=Activities::class, inversedBy="comments")
     * @Groups("comments:read")
     */
    private $activities;

    /**
     * 
     * @ORM\ManyToOne(targetEntity=Reservation::class, inversedBy="comments")
     * @Groups("comments:read")
     */
    private $reservation;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentContent(): ?string
    {
        return $this->comment_content;
    }

    public function setCommentContent(?string $comment_content): self
    {
        $this->comment_content = $comment_content;

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
            $picture->setComments($this);
        }

        return $this;
    }

    public function removePicture(Pictures $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getComments() === $this) {
                $picture->setComments(null);
            }
        }

        return $this;
    }

    public function getForbiddenWords(): ?array
    {
        return $this->forbidden_words;
    }

    public function setForbiddenWords(array $forbidden_words): self
    {
        $this->forbidden_words = $forbidden_words;

        return $this;
    }


    public function getActivities(): ?Activities
    {
        return $this->activities;
    }

    public function setActivities(?Activities $activities): self
    {
        $this->activities = $activities;

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
}
