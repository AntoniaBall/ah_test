<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use function Symfony\Component\String\u;
use App\Controller\CommentController;

/**
*
* @ApiResource(
*     attributes={"security"="is_granted('IS_AUTHENTICATED_FULLY')"},
*     order={​​​​​​​"PublishedAt"="DESC"}​​​​​​​,
*     collectionOperations={
*          "get"={​​​​​​​"normalization_context"={​​​​​​​"groups"="comments:list"}​​​​​​​},
*          "post" = { "security_post_denormalize" = "is_granted('COMMENT_CREATE', object)" },
*          "controller"=CommentController::class
*     },
*     itemOperations={
*          "get" = { "security" = "is_granted('COMMENT_READ', object)" },
*          "put" = { "security" = "is_granted('COMMENT_EDIT', object) and (object.owner == user and previous_object.owner == user)" },
*          "delete" = { "security" = "is_granted('COMMENT_DELETE', object) and (object.owner == user and previous_object.owner == user)" }
*     },
* )
*
* @ApiFilter(SearchFilter::class, properties={"Activities": "exact"})
* @ORM\Entity(repositoryClass= CommentsRepository::class)
*/
class Comments
{
    /**
     * @Groups({"comments:list"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @Groups({"comments:list"})
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
     * @Groups({"comments:list"})
     * @ORM\OneToMany(targetEntity=Pictures::class, mappedBy="comments")
     */
    private $pictures;

    /**
     * 
     * @ORM\Column(type="array")
     *
     */
    private $forbidden_words = [];

    /**
     *
     * @Groups({"comments:list"})
     * @ORM\ManyToOne(targetEntity=Activities::class, inversedBy="comments")
     */
    private $activities;

    /**
     * 
     * @ORM\ManyToOne(targetEntity=Reservation::class, inversedBy="comments")
     *
     * @Groups({"comments:list"})
     */
    private $reservation;

   
    
    /**
     * @ORM\Column(type="datetime")
     *
     * @Groups({"comments:list"})
     */
    private $PublishedAt;

    /**
     * @Groups({"comments:list"})
     * @ORM\ManyToOne(targetEntity=user::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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

  
 
    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->PublishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $PublishedAt): self
    {
        $this->PublishedAt = $PublishedAt;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }
}
