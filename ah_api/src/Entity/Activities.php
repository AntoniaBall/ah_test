<?php

namespace App\Entity;

use App\Repository\ActivitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Property;

/**
 * @ApiResource(normalizationContext={"groups"={"activities:read"}},
 *   denormalizationContext={"groups"={"activities:write"}})
 * @ORM\Entity(repositoryClass=ActivitiesRepository::class)
 */
class Activities
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
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     * @Assert\Length(
     * min = 10,
     * max = 300,
     * minMessage = "La longueur de votre activité doit être supérieure à {{ limit }} caractères",
     * maxMessage = "La longeur de votre activité doit être inférieure à {{ limit }} caractères"
     * 
     * )
     * @Groups({"activities:read", "activities:write", "property:read"})
     */
    private $description;

    /**
     * 
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     * @Assert\Length(
     * min = 5,
     * max = 100,
     * minMessage = "Le titre de votre activité doit être supérieure à {{ limit }} caractères",
     * maxMessage = "Le titre de votre activité doit être inférieure à {{ limit }} caractères"
     * )
     * @Groups({"activities:read", "activities:write", "property:read"})
     */
    private $title;

    /**
     * 
     * @ORM\ManyToMany(targetEntity=Property::class, inversedBy="activities")
     * @Groups("activities:read")
     */
    private $Property;

    /**
     * 
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="activities")
     * @Groups("activities:read")
     */
    private $comments;

    /**
     * 
     * @ORM\OneToMany(targetEntity=Pictures::class, mappedBy="activities")
     * @Groups("activities:read")
     */
    private $pictures;

    public function __construct()
    {
        $this->Property = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
    /**
     * @return Collection|Property[]
     */
    public function getProperty(): Collection
    {
        return $this->Property;
    }

    public function addProperty(Property $property): self
    {
        if (!$this->Property->contains($property)) {
            $this->Property[] = $property;
        }

        return $this;
    }

    public function removeProperty(Property $property): self
    {
        $this->Property->removeElement($property);

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
            $comment->setActivities($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getActivities() === $this) {
                $comment->setActivities(null);
            }
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
            $picture->setActivities($this);
        }

        return $this;
    }

    public function removePicture(Pictures $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getActivities() === $this) {
                $picture->setActivities(null);
            }
        }

        return $this;
    }
}
